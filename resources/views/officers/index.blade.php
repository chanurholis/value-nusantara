@extends('layouts.officer-master')

@section('title', '| Dashboard')

@section('title-header', 'Beranda')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pengguna</h4>
                    </div>
                    <div class="card-body">{{ $users->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Petugas</h4>
                    </div>
                    <div class="card-body">{{ $officers->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-ring"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Barang</h4>
                    </div>
                    <div class="card-body">{{ $goodies->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-gavel"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Lelang</h4>
                    </div>
                    <div class="card-body">{{ $auctions->count() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Statistics</h4>
              <div class="card-header-action">
                <div class="btn-group">
                  <a href="#" class="btn btn-primary">Week</a>
                  <a href="#" class="btn">Month</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <canvas id="myChart" height="182"></canvas>
              <div class="statistic-details mt-sm-4">
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                  <div class="detail-value">$243</div>
                  <div class="detail-name">Today's Sales</div>
                </div>
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                  <div class="detail-value">$2,902</div>
                  <div class="detail-name">This Week's Sales</div>
                </div>
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                  <div class="detail-value">$12,821</div>
                  <div class="detail-name">This Month's Sales</div>
                </div>
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                  <div class="detail-value">$92,142</div>
                  <div class="detail-name">This Year's Sales</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Recent Activities</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="http://localhost/TEMPLATE/stisla/assets/img/avatar/avatar-1.png" alt="avatar">
                  <div class="media-body">
                    <div class="float-right text-primary">Now</div>
                    <div class="media-title">Farhan A Mujib</div>
                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.</span>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="http://localhost/TEMPLATE/stisla/assets/img/avatar/avatar-2.png" alt="avatar">
                  <div class="media-body">
                    <div class="float-right">12m</div>
                    <div class="media-title">Ujang Maman</div>
                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.</span>
                  </div>
                </li>
                <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="http://localhost/TEMPLATE/stisla/assets/img/avatar/avatar-3.png" alt="avatar">
                  <div class="media-body">
                    <div class="float-right">17m</div>
                    <div class="media-title">Rizal Fakhri</div>
                    <span class="text-small text-muted">Lorem ipsum dolor sit amet!</span>
                  </div>
                </li>
                {{-- <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="http://localhost/TEMPLATE/stisla/assets/img/avatar/avatar-4.png" alt="avatar">
                  <div class="media-body">
                    <div class="float-right">21m</div>
                    <div class="media-title">Alfa Zulkarnain</div>
                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                  </div>
                </li> --}}
              </ul>
              <div class="text-center pt-1 pb-1">
                <a href="#" class="btn btn-primary btn-lg btn-round">
                  View All
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
