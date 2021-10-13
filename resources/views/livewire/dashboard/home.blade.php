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
                            <div id="chart-dashbord-total-employee"></div>

						    {{-- <div class="chart-overflow" id="p"></div> --}}
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
                            <div id="chart-dashbord-kartap-division"></div>
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
                            <div id="chart-dashbord-umur-division"></div>
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
                            <div id="chart-dashbord-jenis-kelamin-division"></div>
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
                            <div id="chart-dashbord-length-of-work"></div>
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
                            <div id="chart-dashbord-educational-background"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>Graph Employee</h5>
                                <div class="center-content">
                                    <p>Yearly Employee Total : 1800</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            {{-- <div id="user-activation-dash-2"></div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}

    </div>
</div>

</div>
@push('scripts')
	{{-- <script src="{{ asset('assets/js/chart/google/google-chart-loader.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('assets/js/chart/google/google-chart.js') }}" defer></script> --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        google.charts.load('current', {packages: ['corechart']});
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['CITY', 'TOTAL'],
                ['JAKARTA', {{ $grafik_work['JAKARTA'] }}],
                ['SOLO', {{ $grafik_work['SOLO'] }}],
                ['KLATEN', {{ $grafik_work['KLATEN'] }}]
            ]);
            var options = {

                pieHole: 0.4,
                width:'100%',
                height: 300,
                colors: [vihoAdminConfig.secondary, vihoAdminConfig.primary, "#222222", "#717171", "#e2c636"]
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-dashbord-total-employee'));
            chart.draw(data, options);
        }

        function drawChartKartapDivision() {
            var data = google.visualization.arrayToDataTable([
                ['Directorat', 'TOTAL'],
                ['BUSINESS SUPPORT', {{ $grafik_direktorat['BUSINESS SUPPORT'] }}],
                ['CORPORATE', {{ $grafik_direktorat['CORPORATE'] }}],
                ["MARKETING & BUSINESS", {{ $grafik_direktorat["MARKETING & BUSINESS"] }}],
                ["OPERATION", {{ $grafik_direktorat["OPERATION"] }}]
                // ['Work',     15],
                // ['Eat',      2],
                // ['Commute',  11],
                // ['Watch TV', 2],
                // ['Sleep',    7]
            ]);
            var options = {

                pieHole: 0.4,
                width:'100%',
                height: 300,
                colors: [vihoAdminConfig.secondary, vihoAdminConfig.primary, "#222222", "#717171", "#e2c636"]
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-dashbord-kartap-division'));
            chart.draw(data, options);
        }

        function drawChartEmployeeStatus() {
            var data = google.visualization.arrayToDataTable([
                ['EMPLOYEE STATUS', 'TOTAL'],
                ['TELKOM SUPPORT', {{ $grafik_statusEmployee['TELKOM SUPPORT'] }}],
                ['KARTAP', {{ $grafik_statusEmployee['KARTAP'] }}],
                ["PKWT ADMEDIKA", {{ $grafik_statusEmployee["PKWT ADMEDIKA"] }}],
                ["OUTSOURCE", {{ $grafik_statusEmployee["OUTSOURCE"] }}]
                // ['Work',     15],
                // ['Eat',      2],
                // ['Commute',  11],
                // ['Watch TV', 2],
                // ['Sleep',    7]
            ]);
            var options = {

                pieHole: 0.4,
                width:'100%',
                height: 300,
                colors: [vihoAdminConfig.secondary, vihoAdminConfig.primary, "#222222", "#717171", "#e2c636"]
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-dashbord-umur-division'));
            chart.draw(data, options);
        }

        function drawChartEmployeeAge() {
            var data = google.visualization.arrayToDataTable([
                ['EMPLOYEE AGE', 'TOTAL'],
                ['< 30 Years', {{ $grafik_age['< 30 Years'] }}],
                ['30 - 40 Years', {{ $grafik_age['30 - 40 Years'] }}],
                ["> 40 Years", {{ $grafik_age["> 40 Years"] }}]
                // ['Work',     15],
                // ['Eat',      2],
                // ['Commute',  11],
                // ['Watch TV', 2],
                // ['Sleep',    7]
            ]);
            var options = {

                pieHole: 0.4,
                width:'100%',
                height: 300,
                colors: [vihoAdminConfig.secondary, vihoAdminConfig.primary, "#222222", "#717171", "#e2c636"]
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-dashbord-jenis-kelamin-division'));
            chart.draw(data, options);
        }

        function drawChartEmployeeLengthWork() {
            var data = google.visualization.arrayToDataTable([
                ['EMPLOYEE LENGTH OF WORKING', 'TOTAL'],
                ['< 5 Years', {{ $grafik_lenght_work['< 5 Years'] }}],
                ['6 - 10 Years', {{ $grafik_lenght_work['6 - 10 Years'] }}],
                ["11 - 15 Years", {{ $grafik_lenght_work["11 - 15 Years"] }}],
                ["> 15 Years", {{ $grafik_lenght_work["> 15 Years"] }}]
            ]);
            var options = {

                pieHole: 0.4,
                width:'100%',
                height: 300,
                colors: [vihoAdminConfig.secondary, vihoAdminConfig.primary, "#222222", "#717171", "#e2c636"]
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-dashbord-length-of-work'));
            chart.draw(data, options);
        }

        function drawChartEmployeeEducational() {
            var data = google.visualization.arrayToDataTable([
                ['EMPLOYEE EDUCATIONAL BACKGROUND', 'TOTAL'],
                ['S2', {{ $grafik_edus['S2'] }}],
                ['S1', {{ $grafik_edus['S1'] }}],
                ["D1 - D4", {{ $grafik_edus["D1 - D4"] }}],
                ["SMA / SMU", {{ $grafik_edus["SMA / SMU"] }}]
            ]);
            var options = {

                pieHole: 0.4,
                width:'100%',
                height: 300,
                colors: [vihoAdminConfig.secondary, vihoAdminConfig.primary, "#222222", "#717171", "#e2c636"]
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-dashbord-educational-background'));
            chart.draw(data, options);
        }
        document.addEventListener('turbolinks:load', function () {
            google.charts.setOnLoadCallback(drawChart)
            google.charts.setOnLoadCallback(drawChartKartapDivision)
            google.charts.setOnLoadCallback(drawChartEmployeeStatus)
            google.charts.setOnLoadCallback(drawChartEmployeeAge)
            google.charts.setOnLoadCallback(drawChartEmployeeLengthWork)
            google.charts.setOnLoadCallback(drawChartEmployeeEducational)
        })



    </script>
@endpush

@push('scripts')


