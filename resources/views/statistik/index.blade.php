@extends('adminlte::page')

@section('title', 'Prediksi Diabetes')

@section('content_header')

<meta name="csrf-token" content="{{ csrf_token() }}">


  <ol class="breadcrumb">
    <li><a href="/admin/statistik><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Beranda</li>
  </ol>
    
@stop


@section('content')

<section class="content-header">
  <h1>
    Beranda
    <small>Version 1.0</small>
  </h1>

            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                  <h3>{{$jmldm1}}</h3>
      
                    <p>Diabetes Tipe 1</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                  <h3>{{$jmldm2}}<sup style="font-size: 20px"></sup></h3>
      
                    <p>Diabetes Tipe 2</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                  <h3>{{$jmldml}}</h3>
      
                    <p>Diabetes Tipe Lain</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                  <h3>{{$jmldmg}}</h3>
      
                    <p>Diabetes Gestasional</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <!-- Mulai Graph -->
               <!-- Mulai Graph -->
               <div>
               </div>
               <!-- End Graph -->
      <!-- Kalau Mau ada Chart disini -->
      <div class="row">
    <div>

      </div>

      <!-- / End Chart -->
@stop

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@stop
@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
  chart: {
    type: 'line'
  },
  series: [{
    name: 'sales',
    data: [30,40,35,50,49,60,70,91,125]
  }],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  }
}
var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
  </script>
@stop

