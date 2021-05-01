@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid mt--7">
        <div class="row">
            
            <div  class="col-xl-4">
                <div style="background-color: #3c8dbc;" class="card shadow">
                    <div style="background-color: #3c8dbc;"   class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div  class="col">
                                <!-- <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6> -->
                                <h2 style="color: white;" class="mb-0">Total User</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                        <h2 style="color: white;" class="mb-0">{{$users_count}}</h2}>
                            <!-- <canvas id="chart-orders" class="chart-canvas"></canvas> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top:20px" class="row">
            
            <div class="col-lg-4 col-xs-6">
                <div style="background-color: #FF0042;" class="card shadow">
                    <div style="background-color: #FF0042;" class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6> -->
                                <h2 style="color: white;" class="mb-0">Total Item Issue</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                        <h2 style="color: white;" class="mb-0">{{$users_count}}</h2}>
                            <!-- <canvas id="chart-orders" class="chart-canvas"></canvas> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top:20px" class="row">
            
            <div class="col-lg-4 col-xs-6">
                <div style="background-color: #D7D71F;" class="card shadow">
                    <div style="background-color: #D7D71F;" class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6> -->
                                <h2 style="color: white;" class="mb-0">Total Item Due</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                        <h2 style="color: white;" class="mb-0">{{$users_count}}</h2}>
                            <!-- <canvas id="chart-orders" class="chart-canvas"></canvas> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        

</div>
        
        
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
