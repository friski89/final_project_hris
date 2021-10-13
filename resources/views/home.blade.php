<x-admin-layout>
@section('title')Home
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>Home</h3>
    @endslot
    <li class="breadcrumb-item active">Welcome</li>
@endcomponent
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
</div> --}}
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
                            <h5>8,50,49</h5>
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
                            <h5>2,03,59</h5>
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
                            <h5>2,03,59</h5>
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
                            <h5>2,03,59</h5>
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
                            <h5>8,50,49</h5>
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
                            <h5>2,03,59</h5>
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
                            <h5>2,03,59</h5>
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
                            <h5>2,03,59</h5>
                            <p>Total Unit</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>90.54% </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>Total Employee Per Division </h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="chart-dashbord-total-employee"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>Total Karyawan Tetap Per Division </h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="chart-dashbord-kartap-division"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>Total Umur Karyawan Perdivision </h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="chart-dashbord-umur-division"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>Total Jenis Kelamin Karyawan Perdivision </h5>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="chart-dashbord-jenis-kelamin-division"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 box-col-12 des-xl-100">
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
                            <div id="user-activation-dash-2"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
      <!-- Container-fluid Ends-->
    @push('scripts')
      <script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
      <script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
      <script src="{{asset('assets/js/chart/knob/knob.min.js')}}"></script>
      <script src="{{asset('assets/js/chart/knob/knob-chart.js')}}"></script>
      <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
      <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
      <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
      <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
      <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
      <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
      <script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js')}}"></script>
      <script src="{{asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/default.js')}}"></script>
      <script src="{{asset('assets/js/notify/index.js')}}"></script>
      <script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
      <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
      <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    @endpush
</x-admin-layout>



