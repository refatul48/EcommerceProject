<?php

namespace App\Library\SslCommerz;

class SslCommerzNotification extends AbstractSslCommerz
{
    protected $data = [];
    protected $config = [];

    public function __construct()
    {
        $this->config = config('sslcommerz');
        $this->setStoreId($this->config['apiCredentials']['store_id']);
        $this->setStorePassword($this->config['apiCredentials']['store_password']);
    }

    public function orderValidate($post_data, $trx_id = '', $amount = 0, $currency = "BDT")
    {
        if ($post_data == '' && $trx_id == '' && !is_array($post_data)) {
            $this->error = "Please provide valid transaction ID and post request data";
            return $this->error;
        }

        return $this->validate($trx_id, $amount, $currency, $post_data);
    }

    protected function validate($merchant_trans_id, $merchant_trans_amount, $merchant_trans_currency, $post_data)
    {
        if (!empty($merchant_trans_id) && !empty($merchant_trans_amount)) {
            $post_data['store_id'] = $this->getStoreId();
            $post_data['store_pass'] = $this->getStorePassword();

            $val_id = urlencode($post_data['val_id']);
            $store_id = urlencode($this->getStoreId());
            $store_passwd = urlencode($this->getStorePassword());
            $requested_url = ($this->config['apiDomain'] . $this->config['apiUrl']['order_validate'] . "?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");

            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $requested_url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

            if ($this->config['connect_from_localhost']) {
                curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
            } else {
                curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 2);
            }

            $result = curl_exec($handle);
            $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

            if ($code == 200 && !(curl_errno($handle))) {
                $result = json_decode($result);
                $this->sslc_data = $result;

                $status = $result->status;
                $tran_date = $result->tran_date;
                $tran_id = $result->tran_id;
                $val_id = $result->val_id;
                $amount = $result->amount;
                $store_amount = $result->store_amount;
                $bank_tran_id = $result->bank_tran_id;
                $card_type = $result->card_type;
                $currency_type = $result->currency_type;
                $currency_amount = $result->currency_amount;

                $card_no = $result->card_no;
                $card_issuer = $result->card_issuer;
                $card_brand = $result->card_brand;
                $card_issuer_country = $result->card_issuer_country;
                $card_issuer_country_code = $result->card_issuer_country_code;

                $APIConnect = $result->APIConnect;
                $validated_on = $result->validated_on;
                $gw_version = $result->gw_version;

                if ($status == "VALID" || $status == "VALIDATED") {
                    if ($merchant_trans_currency == "BDT") {
                        if (trim($merchant_trans_id) == trim($tran_id) && (abs($merchant_trans_amount - $amount) < 1) && trim($merchant_trans_currency) == trim('BDT')) {
                            return true;
                        } else {
                            $this->error = "Data has been tempered";
                            return false;
                        }
                    } else {
                        if (trim($merchant_trans_id) == trim($tran_id) && (abs($merchant_trans_amount - $currency_amount) < 1) && trim($merchant_trans_currency) == trim($currency_type)) {
                            return true;
                        } else {
                            $this->error = "Data has been tempered";
                            return false;
                        }
                    }
                } else {
                    $this->error = "Failed Transaction";
                    return false;
                }
            } else {
                $this->error = "Faile to connect with SSLCOMMERZ";
                return false;
            }
        } else {
            $this->error = "Invalid data";
            return false;
        }
    }

    public function makePayment(array $requestData, $type = 'checkout', $pattern = 'json')
    {
        if (empty($requestData)) {
            return "Please provide a valid information list about transaction with transaction id, amount, success url, fail url, cancel url, store id and pass at least";
        }

        $header = [];

        $this->setApiUrl($this->config['apiDomain'] . $this->config['apiUrl']['make_payment']);

        $this->setParams($requestData);
        $this->setAuthenticationInfo();

        $response = $this->callToApi($this->data, $header, $this->config['connect_from_localhost']);
        $formattedResponse = $this->formatResponse($response, $type, $pattern);

        if ($type == 'hosted') {
            if (!empty($formattedResponse['GatewayPageURL'])) {
                $this->redirect($formattedResponse['GatewayPageURL']);
            } else {
                return $formattedResponse['failedreason'];
            }
        } else {
            return $formattedResponse;
        }
    }

    protected function setSuccessUrl()
    {
        $this->successUrl = rtrim(env('APP_URL'), '/') . $this->config['success_url'];
    }

    protected function getSuccessUrl()
    {
        return $this->successUrl;
    }

    protected function setFailedUrl()
    {
        $this->failedUrl = rtrim(env('APP_URL'), '/') . $this->config['failed_url'];
    }

    protected function getFailedUrl()
    {
        return $this->failedUrl;
    }

    protected function setCancelUrl()
    {
        $this->cancelUrl = rtrim(env('APP_URL'), '/') . $this->config['cancel_url'];
    }

    protected function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    protected function setIPNUrl()
    {
        $this->ipnUrl = rtrim(env('APP_URL'), '/') . $this->config['ipn_url'];
    }

    protected function getIPNUrl()
    {
        return $this->ipnUrl;
    }

    public function setParams($requestData)
    {
        $this->setRequiredInfo($requestData);
        $this->setCustomerInfo($requestData);
        $this->setShipmentInfo($requestData);
        $this->setProductInfo($requestData);
        $this->setAdditionalInfo($requestData);
    }

    public function setAuthenticationInfo()
    {
        $this->data['store_id'] = $this->getStoreId();
        $this->data['store_passwd'] = $this->getStorePassword();
    }

    public function setRequiredInfo(array $info)
    {
        $this->data['total_amount'] = $info['total_amount'];
        $this->data['currency'] = $info['currency'];
        $this->data['tran_id'] = $info['tran_id'];
        $this->data['product_category'] = $info['product_category'];

        $this->setSuccessUrl();
        $this->setFailedUrl();
        $this->setCancelUrl();
        $this->setIPNUrl();

        $this->data['success_url'] = $this->getSuccessUrl();
        $this->data['fail_url'] = $this->getFailedUrl();
        $this->data['cancel_url'] = $this->getCancelUrl();
        $this->data['ipn_url'] = $this->getIPNUrl();
    }

    public function setCustomerInfo(array $info)
    {
        $this->data['cus_name'] = $info['cus_name'];
        $this->data['cus_email'] = $info['cus_email'];
        $this->data['cus_add1'] = $info['cus_add1'];
        $this->data['cus_add2'] = $info['cus_add2'];
        $this->data['cus_city'] = $info['cus_city'];
        $this->data['cus_state'] = $info['cus_state'];
        $this->data['cus_postcode'] = $info['cus_postcode'];
        $this->data['cus_country'] = $info['cus_country'];
        $this->data['cus_phone'] = $info['cus_phone'];
        $this->data['cus_fax'] = $info['cus_fax'];
    }

    public function setShipmentInfo(array $info)
    {
        $this->data['shipping_method'] = $info['shipping_method'];
        $this->data['num_of_item'] = $info['num_of_item'];
        $this->data['ship_name'] = $info['ship_name'];
        $this->data['ship_add1'] = $info['ship_add1'];
        $this->data['ship_add2'] = $info['ship_add2'];
        $this->data['ship_city'] = $info['ship_city'];
        $this->data['ship_state'] = $info['ship_state'];
        $this->data['ship_postcode'] = $info['ship_postcode'];
        $this->data['ship_country'] = $info['ship_country'];
    }

    public function setProductInfo(array $info)
    {
        $this->data['product_name'] = $info['product_name'];
        $this->data['product_category'] = $info['product_category'];
        $this->data['product_profile'] = $info['product_profile'];
        $this->data['hours_till_departure'] = $info['hours_till_departure'];
        $this->data['flight_type'] = $info['flight_type'];
        $this->data['pnr'] = $info['pnr'];
        $this->data['journey_from_to'] = $info['journey_from_to'];
        $this->data['third_party_booking'] = $info['third_party_booking'];
        $this->data['hotel_name'] = $info['hotel_name'];
        $this->data['length_of_stay'] = $info['length_of_stay'];
        $this->data['check_in_time'] = $info['check_in_time'];
        $this->data['hotel_city'] = $info['hotel_city'];
        $this->data['product_type'] = $info['product_type'];
        $this->data['topup_number'] = $info['topup_number'];
        $this->data['country_topup'] = $info['country_topup'];
        $this->data['cart'] = $info['cart'];
        $this->data['product_amount'] = $info['product_amount'];
        $this->data['vat'] = $info['vat'];
        $this->data['discount_amount'] = $info['discount_amount'];
        $this->data['convenience_fee'] = $info['convenience_fee'];
    }

    public function setAdditionalInfo(array $info)
    {
        $this->data['value_a'] = $info['value_a'];
        $this->data['value_b'] = $info['value_b'];
        $this->data['value_c'] = $info['value_c'];
        $this->data['value_d'] = $info['value_d'];
    }
}
