<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'order_number',
        'total_price',
        'payment_method',
        'status',
        'payment_status',
        'transaction_id',
        'currency',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_RETURNED = 'returned';

    const PAYMENT_PENDING = 'pending_payment';
    const PAYMENT_DUE = 'payment_due';
    const PAYMENT_PAID = 'paid';
    const PAYMENT_FAILED = 'payment_failed';
    const PAYMENT_REFUNDED = 'refunded';

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Generate a unique 5-digit order number before creating a new order
        static::creating(function ($order) {
            $order->order_number = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        });
    }






}
