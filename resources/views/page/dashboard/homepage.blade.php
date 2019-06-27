@extends('layouts.base')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mt-2 mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
        </div>

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" style="background-color: #b1e1e8">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tin gửi thành công</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-send-o fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-4 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" style="background-color: #fff0c4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tin gửi lỗi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-exclamation-triangle fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart by Month -->
        <div class="row">
            <div class="col-10">
                <canvas id="smsChartDate" height="100%"></canvas>
            </div>
        </div>

        <!-- Chart by Date -->
        <div class="row">
            <div class="col-10">
                <canvas id="smsChartMonth" height="100%"></canvas>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>    
    
    <script>
        // Chart Date
        var ctxDate = document.getElementById('smsChartDate');
        var smsChartDate = new Chart(ctxDate, {
            type: 'line',
            data: {
                labels : [
                   "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", 
                   "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", 
                   "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"
                ],
                datasets: [
                    {
                        label: "SMS gửi thành công",
                        data: [3, 8, 6, 11, 7, 9, 8, 6, 2, 5, 10, 9, 8, 6, 2, 5, 10, 9, 8, 6, 12, 5, 10, 9, 8, 6, 2, 5, 10, 9, 15, 9],
                        backgroundColor:  '#408843', 
                        borderColor: "#0f351d"
                    },
                    {
                        label: "SMS gửi lỗi",
                        data: [3, 8, 6, 11, 7, 9, 8, 6, 2, 5, 10, 9, 8, 16, 2, 5, 10, 9, 8, 6, 2, 12, 10, 9, 8, 6, 2, 5, 10, 9, 5, 9],
                        backgroundColor:  '#3d6a96', 
                        borderColor: "#182167"
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        stacked: true
                    }]
                },
            },
        });

        // Chart Month
        var ctxMonth = document.getElementById('smsChartMonth');
        var smsChartMonth = new Chart(ctxMonth, {
            type: 'line',
            data: {
                labels : [
                   "T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"
                ],
                datasets: [
                    {
                        label: "2019",
                        data: [10, 8, 6, 11, 7, 9, 8, 6, 12, 5, 10, 9],
                        backgroundColor:  '#80924d', 
                        borderColor: "#393e2d"
                    },
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        stacked: true
                    }]
                },
            },
        });
    </script>
@endsection
