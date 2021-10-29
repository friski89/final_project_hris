<div>
    @section('title')Home
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>Home</h3>
    @endslot
    <li class="breadcrumb-item active">Welcome</li>
@endcomponent

<div class="container-fluid dashboard-default-sec">
    <div class="row">
        <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $totalKaryawan ?? 0 }}</h5>
                            <p>Total Keseluruhan Karyawan</p>
                            <a class="btn-arrow arrow-primary" href="javascript:void(0)">
                                <i class="toprightarrow-primary fa fa-arrow-up me-2"></i>95.54%
                            </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $karyawanTelkom ?? 0 }}</h5>
                            <p>Total Karyawan Telkom</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $karyawanTetap ?? 0 }}</h5>
                            <p>Total Karyawan Tetap</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $karyawanKontrak ?? 0 }}</h5>
                            <p>Total Karyawan Kontrak</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $directorat }}</h5>
                            <p>Total Directorat</p>
                            <a class="btn-arrow arrow-primary" href="javascript:void(0)">
                                <i class="toprightarrow-primary fa fa-arrow-up me-2"></i>95.54%
                            </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $division }}</h5>
                            <p>Total Divisi</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $departement }}</h5>
                            <p>Total Department</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ $unit }}</h5>
                            <p>Total Unit</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>WORKING AREA</h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <figure class="highcharts-figure">
                                <div id="grafWorking"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>PER DIRECTORATE</h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="grafDirektorat"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>EMPLOYEEMENT STATUS</h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="grafEmployee"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>AGE</h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="grafAge"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>LENGTH OF WORK</h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="grafLength"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>EDUCATIONAL BACKGROUND</h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="grafEdu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@push('scripts')
    <script>
       Highcharts.chart('grafWorking', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'WORKING AREA'
            },
            tooltip: {
                pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>value: {point.y}'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Direktorat',
                colorByPoint: true,
                data: [{
                    name: 'Jakarta',
                    y: {{ $grafik_work['JAKARTA'] }}
                }, {
                    name: 'SOLO',
                    y: {{ $grafik_work['SOLO'] }}
                }, {
                    name: 'KLATEN',
                    y: {{ $grafik_work['KLATEN'] }}
                }]
            }]
        });

        Highcharts.chart('grafDirektorat', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Direktorat'
            },
            tooltip: {
                pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>value: {point.y}'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Direktorat',
                colorByPoint: true,
                data: [{
                    name: 'BUSINESS SUPPORT',
                    y: {{ $grafik_direktorat['BUSINESS SUPPORT'] }}
                }, {
                    name: 'CORPORATE',
                    y: {{ $grafik_direktorat['CORPORATE'] }}
                }, {
                    name: 'MARKETING & BUSINESS',
                    y: {{ $grafik_direktorat['MARKETING & BUSINESS'] }}
                },{
                    name: 'OPERATION',
                    y: {{ $grafik_direktorat['OPERATION'] }}
                }]
            }]
        });

        Highcharts.chart('grafEmployee', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Employeement Status'
            },
            tooltip: {
                pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>value: {point.y}'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Employeement Status',
                colorByPoint: true,
                data: [{
                    name: 'TELKOM SUPPORT',
                    y: {{ $grafik_statusEmployee['TELKOM SUPPORT'] }}
                }, {
                    name: 'KARTAP',
                    y: {{ $grafik_statusEmployee['KARTAP'] }}
                }, {
                    name: 'PKWT ADMEDIKA',
                    y: {{ $grafik_statusEmployee['PKWT ADMEDIKA'] }}
                },{
                    name: 'OUTSOURCE',
                    y: {{ $grafik_statusEmployee['OUTSOURCE'] }}
                }]
            }]
        });
        Highcharts.chart('grafAge', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Age'
            },
            tooltip: {
                pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>value: {point.y}'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Employeement Status',
                colorByPoint: true,
                data: [{
                    name: '< 30 Years',
                    y: {{ $grafik_age['< 30 Years'] }}
                }, {
                    name: '30 - 40 Years',
                    y: {{ $grafik_age['30 - 40 Years'] }}
                }, {
                    name: '> 40 Years',
                    y: {{ $grafik_age['> 40 Years'] }}
                }]
            }]
        });
        Highcharts.chart('grafLength', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'EMPLOYEE LENGTH OF WORKING'
            },
            tooltip: {
                pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>value: {point.y}'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'EMPLOYEE LENGTH OF WORKING',
                colorByPoint: true,
                data: [{
                    name: '< 5 Years',
                    y: {{ $grafik_lenght_work['< 5 Years'] }}
                }, {
                    name: '6 - 10 Years',
                    y: {{ $grafik_lenght_work['6 - 10 Years'] }}
                }, {
                    name: '11 - 15 Years',
                    y: {{ $grafik_lenght_work['11 - 15 Years'] }}
                },{
                    name: '> 15 Years',
                    y: {{ $grafik_lenght_work['> 15 Years'] }}
                }]
            }]
        });
        Highcharts.chart('grafEdu', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'EMPLOYEE EDUCATIONAL BACKGROUND'
            },
            tooltip: {
                pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>value: {point.y}'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'EMPLOYEE EDUCATIONAL BACKGROUND',
                colorByPoint: true,
                data: [{
                    name: 'S2',
                    y: {{ $grafik_edus['S2'] }}
                }, {
                    name: 'S1',
                    y: {{ $grafik_edus['S1'] }}
                }, {
                    name: 'D1 - D4',
                    y: {{ $grafik_edus['D1 - D4'] }}
                },{
                    name: 'SMA / SMU',
                    y: {{ $grafik_edus['SMA / SMU'] }}
                }]
            }]
        });

    </script>
@endpush


