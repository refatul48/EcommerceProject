@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">

  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
        <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
            data-feather="calendar" class="text-primary"></i></span>
        <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
      </div>
      <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="printer"></i>
        Print
      </button>
      <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
        Download Report
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Total Sells</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">3,897</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Total Orders</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">3,897</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Total Products</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">20</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Daily Visitors</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">89.87</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">Recents Orders</h6>
          </div>
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th class="pt-0">Order Id</th>
                  <th class="pt-0">Customer</th>
                  <th class="pt-0">Product</th>
                  <th class="pt-0">Amount</th>
                  <th class="pt-0">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Fahim</td>
                  <td>Leather bag</td>
                  <td>$98.00</td>
                  <td><span class="badge bg-success">Paid</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Mahim</td>
                  <td>Fashion jeket</td>
                  <td>$55.00</td>
                  <td><span class="badge bg-danger">Pending</span></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Likhon</td>
                  <td>Cotton tops</td>
                  <td>$85.00</td>
                  <td><span class="badge bg-danger">Unpaid</span></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Bijoy</td>
                  <td>Black half shirt</td>
                  <td>$50.00</td>
                  <td><span class="badge bg-danger">Unpaid</span></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Rahim</td>
                  <td>Leather shoe</td>
                  <td>$60.00</td>
                  <td><span class="badge bg-danger">Unpaid</span></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Karim</td>
                  <td>Leather bag</td>
                  <td>$98.00</td>
                  <td><span class="badge bg-success">Paid</span></td>
                </tr>
                <tr>
                  <td class="border-bottom">7</td>
                  <td class="border-bottom">Hasem</td>
                  <td class="border-bottom">Fashion jeket</td>
                  <td class="border-bottom">$55.00</td>
                  <td class="border-bottom"><span class="badge bg-danger">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection