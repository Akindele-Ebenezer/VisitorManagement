@if (session()->has('Email')) 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Visitor Management System</title>
    <link rel="icon" href="{{ asset('Images/bg-x.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Css/Styles.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.Guy Agassiapis.com/css?family=Montserrat:300,600" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/jquery.selectric/1.10.1/selectric.css" rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.selectric/1.10.1/jquery.selectric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
</head>
<body>
    <div class="Layout">
        @include('Components.Forms.Add.1')
        @include('Components.Forms.Edit.1')
        <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">L.T.T | DEPASA MARINE</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link LogoutRoute Load" href="#">Sign out</a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid Layout-x">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item DashboardRoute Load">
                                <a class="nav-link active" href="#">
                                <i class="zmdi zmdi-widgets"></i>
                                Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li> 
                        </ul>
                        <ul class="nav flex-column mb-2">
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i class="zmdi zmdi-file-text"></i>
                                Users
                                </a>
                            </li> --}}
                            <li class="nav-item LogoutRoute Load">
                                <a class="nav-link" href="#">
                                <i class="zmdi zmdi-file-text"></i>
                                Logout 
                                </a>
                            </li>
                            <div class="frame">
                                <button class="custom-btn btn-5 CreateEntryButton"><span>+ Create Entry</span></button>
                            </div>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center pl-3 mt-4 mb-1 text-muted">
                                <span>Saved reports</span>
                                <a class="d-flex align-items-center text-muted" href="#">
                                    <i class="zmdi zmdi-plus-circle-o"></i>
                                </a>
                            </h6> 
                            <li class="nav-item CurrentlyInTheYard Load">
                                <a class="nav-link" href="#">
                                <i class="zmdi zmdi-file-text"></i>
                                Currently in the yard  ({{ $CurrentlyInTheYard }}) 
                                </a>
                            </li>
                            <li class="nav-item SignedOut Load">
                                <a class="nav-link" href="#">
                                <i class="zmdi zmdi-file-text"></i>
                                Signed out  ({{ $SignedOut }}) 
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
                    @yield('Content')
                </main>
            </div>
        </div>
        {{-- <script src="{{ asset('Js/Charts/1.js') }}"></script>  --}}
        <script>
            var Selectize = /** @class */ (function () {
                function Selectize() {
                    this.init();
                }
                Selectize.prototype.init = function () {
                    var initValue;
                    $('.action-box').selectric({
                        onInit: function (element) {
                            initValue = $(this).val();
                        },
                        onChange: function (element) {
                            if ($(this).val() !== initValue)
                                $(element).parents('form').submit();
                        }
                    });
                };
                return Selectize;
            }());
            var Charts = /** @class */ (function () {
                function Charts() {
                    this.colors = ["#DB66AE", "#8185D6", "#89D9DF", "#E08886"];
                    this.tickColor = "#757681";
                    this.initRadar();
                    this.initBarHorizontal();
                    this.initDoughnut();
                }
                Charts.prototype.initRadar = function () {
                    var ctxD = $('#radarChartDark'), chartData = {
                        type: 'radar',
                            @php
                                $NumberOfVisitsInTheYear = \DB::table('daily_visitor_entries')
                                                            ->whereYear('EntryDate', date('Y-m-d'))
                                                            ->get();
                                $NumberOfExitsInTheYear = \DB::table('daily_visitor_entries')
                                                            ->whereYear('ExitDate', date('Y-m-d'))
                                                            ->get();
                                $NumberOfExitsAfterClosingHoursInTheYear = \DB::table('daily_visitor_entries')
                                                            ->whereYear('ExitDate', date('Y-m-d'))
                                                            ->where('ExitTime', '>', '17:00')
                                                            ->get();

                                $NumberOfVisitsLastYear = \DB::table('daily_visitor_entries')
                                                            ->whereYear('EntryDate', date('Y') - 1)
                                                            ->get(); 
                                $NumberOfExitsLastYear = \DB::table('daily_visitor_entries')
                                                            ->whereYear('ExitDate', date('Y') - 1)
                                                            ->get();
                                $NumberOfExitsAfterClosingHoursLastYear = \DB::table('daily_visitor_entries')
                                                            ->whereYear('ExitDate', date('Y') - 1)
                                                            ->where('ExitTime', '>', '17:00')
                                                            ->get();

                                $NumberOfVisitsLast2Years = \DB::table('daily_visitor_entries')
                                                            ->whereYear('EntryDate', date('Y') - 2)
                                                            ->get();
                                $NumberOfExitsLast2Years = \DB::table('daily_visitor_entries')
                                                            ->whereYear('ExitDate', date('Y') - 2)
                                                            ->get();
                                $NumberOfExitsAfterClosingHoursLast2Years = \DB::table('daily_visitor_entries')
                                                            ->whereYear('ExitDate', date('Y') - 2)
                                                            ->where('ExitTime', '>', '17:00')
                                                            ->get();  
                            @endphp  
                        data: {
                            labels: ["Entries", "Exits", "After Closing Hours"],
                            datasets: [
                                {
                                    label: "{{ date('Y') }}",
                                    backgroundColor: this.convertHex(this.colors[0], 20),
                                    borderColor: this.colors[0],
                                    borderWidth: 1,
                                    pointRadius: 2,
                                    data:[ 
                                        {{ count($NumberOfVisitsInTheYear) }}, 
                                        {{ count($NumberOfVisitsInTheYear) }}, 
                                        {{ count($NumberOfExitsInTheYear) }}
                                    ],
                                },
                                {
                                    label: "{{ date('Y') - 1 }}",
                                    backgroundColor: this.convertHex(this.colors[1], 20),
                                    borderColor: this.colors[1],
                                    borderWidth: 1,
                                    pointRadius: 2,
                                    data:[ 
                                        {{ count($NumberOfVisitsLastYear) }}, 
                                        {{ count($NumberOfVisitsLastYear) }}, 
                                        {{ count($NumberOfExitsLastYear) }}
                                    ],
                                },
                                {
                                    label: "{{ date('Y') - 2 }}",
                                    backgroundColor: this.convertHex(this.colors[2], 20),
                                    borderColor: this.colors[2],
                                    borderWidth: 1,
                                    pointRadius: 2,
                                    data:[ 
                                        {{ count($NumberOfVisitsLast2Years) }}, 
                                        {{ count($NumberOfVisitsLast2Years) }}, 
                                        {{ count($NumberOfExitsLast2Years) }}
                                    ],
                                }
                            ]
                        },
                        options: {
                            scale: {
                                pointLabels: {
                                    fontColor: this.tickColor
                                },
                                ticks: {
                                    display: false,
                                    stepSize: 25
                                }
                            },
                            legend: {
                                position: "bottom",
                                labels: {
                                    boxWidth: 11,
                                    fontColor: this.tickColor,
                                    fontSize: 11
                                }
                            }
                        }
                    }, myDarkRadarChart = new Chart(ctxD, chartData);
                };
                Charts.prototype.initBarHorizontal = function () {
                    var ctxD = $("#barChartHDark"), chartData = {
                        type: 'horizontalBar',
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            datasets: [{
                                    data: [
                                        @for ($i = 1; $i <= 12; $i++)
                                            @php
                                                $NumberOfVisitsInEachMonth = \DB::table('daily_visitor_entries')
                                                ->where(function($query) use ($i) {
                                                    $query->whereYear('EntryDate', date('Y-m-d'));
                                                    $query->whereMonth('EntryDate', $i)
                                                            ->orWhereMonth('ExitDate', $i);
                                                })->get();
                                            @endphp 
                                            {{ count($NumberOfVisitsInEachMonth) }},
                                        @endfor
                                    ],
                                    backgroundColor: this.colors[0],
                                    hoverBackgroundColor: this.convertHex(this.colors[0], 70)
                                },
                                {
                                    data: [
                                        @for ($i = 1; $i <= 12; $i++)
                                            @php
                                                $NumberOfVisitsInEachMonth = \DB::table('daily_visitor_entries')
                                                ->where(function($query) use ($i) {
                                                    $query->whereYear('EntryDate', date('Y-m-d'));
                                                    $query->whereMonth('EntryDate', $i);
                                                })->get();
                                            @endphp 
                                            {{ count($NumberOfVisitsInEachMonth) }},
                                        @endfor
                                    ],
                                    backgroundColor: this.colors[1],
                                    hoverBackgroundColor: this.convertHex(this.colors[1], 70)
                                },
                                {
                                    data: [
                                        @for ($i = 1; $i <= 12; $i++)
                                            @php
                                                $NumberOfExitsInEachMonth = \DB::table('daily_visitor_entries')
                                                ->where(function($query) use ($i) {
                                                    $query->whereYear('ExitDate', date('Y-m-d'));
                                                    $query->whereMonth('ExitDate', $i);
                                                })->get();
                                            @endphp 
                                            {{ count($NumberOfExitsInEachMonth) }},
                                        @endfor
                                    ],
                                    backgroundColor: this.colors[2],
                                    hoverBackgroundColor: this.convertHex(this.colors[2], 70)
                                }]
                        },
                        options: {
                            barThickness: 10,
                            scales: {
                                xAxes: [{
                                        stacked: true,
                                        ticks: {
                                            fontColor: this.tickColor,
                                        },
                                        gridLines: {
                                            drawOnChartArea: false
                                        }
                                    }],
                                yAxes: [{
                                        stacked: true,
                                        ticks: {
                                            fontColor: this.tickColor,
                                            min: 0,
                                            max: 175,
                                            stepSize: 25
                                        }
                                    }]
                            },
                            legend: {
                                display: false
                            }
                        }
                    }, myDarkRadarChart = new Chart(ctxD, chartData);
                };
                Charts.prototype.initDoughnut = function () {
                    var ctxD = $('#doughnutChartDark'), chartData = {
                        type: 'doughnut',
                        data: {
                            labels: ["Entries", "Exits", "After Closing Hours"],
                            datasets: [{ 
                                    data: [ 
                                        {{ count($NumberOfVisitsInTheYear) }}, 
                                        {{ count($NumberOfExitsInTheYear) }}, 
                                        {{ count($NumberOfExitsAfterClosingHoursInTheYear) }}
                                    ],
                                    borderWidth: 0,
                                    backgroundColor: [
                                        this.convertHex(this.colors[0], 60),
                                        this.convertHex(this.colors[1], 60),
                                        this.convertHex(this.colors[2], 60),
                                    ],
                                    hoverBackgroundColor: [
                                        this.colors[0],
                                        this.colors[1],
                                        this.colors[2],
                                    ]
                                }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: "bottom",
                                labels: {
                                    boxWidth: 11,
                                    fontColor: this.tickColor,
                                    fontSize: 11
                                }
                            }
                        }
                    }, myDarkRadarChart = new Chart(ctxD, chartData);
                };
                Charts.prototype.convertHex = function (hex, opacity) {
                    hex = hex.replace('#', '');
                    var r = parseInt(hex.substring(0, 2), 16);
                    var g = parseInt(hex.substring(2, 4), 16);
                    var b = parseInt(hex.substring(4, 6), 16);
                    var result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')';
                    return result;
                };
                return Charts;
            }());
            new Selectize();
            new Charts();

        </script>
        <script src="{{ asset('Js/Links.js') }}"></script>
        <script src="{{ asset('Js/Delete/1.js') }}"></script>
        <script src="{{ asset('Js/Forms/Add/1.js') }}"></script>
        <script src="{{ asset('Js/Forms/Edit/1.js') }}"></script>
        <script src="{{ asset('Js/Forms/Delete/1.js') }}"></script>
    </div>
</body>
</html> 
@else
     <script>window.location = '/';</script>
@endif