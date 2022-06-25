@extends('layouts.admin-master')

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
  </section>
@endsection
