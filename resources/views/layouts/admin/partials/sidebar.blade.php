<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ auth()->user()->avatar_url }}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="{{ route('Myprofile') }}"> <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->name }}</h6></a>
        <p class="mb-0 font-roboto">{{ auth()->user()->jobTitle->name }}</p>
    </div>
    <nav class="">
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{routeActive('home')}}" href="{{ route('home') }}"><i data-feather="home"></i><span>Home</span></a>
                    </li>

                    @can('hris')
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{routeActive('dashboard.employee')}}" href="{{ route('dashboard.employee') }}"><i data-feather="home"></i><span>Dashboard Employee</span></a>
                    </li>
                        <li class="sidebar-main-title">
                        <div>
                            <h6>ERP</h6>
                        </div>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('erp/hris') }}" href="javascript:void(0)"><i data-feather="home"></i><span>HRIS</span></a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('erp/hris') }};">
                                <li><a href="{{route('users.index')}}" class="{{routeActive('users*')}}">Data Karyawan</a></li>
                                <li><a href="{{route('employeeExpired.index')}}" class="{{routeActive('employeeExpired*')}}">Karyawan Habis Kontrak</a></li>
                                <li><a href="{{route('resign.index')}}" class="{{routeActive('resign*')}}">Data Resign</a></li>
                                <li><a href="{{route('service-histories.index')}}" class="{{routeActive('service-histories*')}}">Riwayat Kedinasan</a></li>
                                <li><a href="{{route('assignment-histories.index')}}" class="{{routeActive('assignment-histories*')}}">Riwayat Penugasan Khusus</a></li>
                                <li><a href="{{route('performance-appraisal-histories.index')}}" class="{{routeActive('performance-appraisal-histories*')}}">Riwayat Penilaian Kinerja</a></li>
                                <li><a href="{{route('achievement-histories.index')}}" class="{{routeActive('achievement-histories*')}}">Riwayat Prestasi</a></li>
                                <li><a href="{{route('educational-backgrounds.index')}}" class="{{routeActive('educational-backgrounds*')}}">Riwayat Pendidikan</a></li>
                                <li><a href="{{route('training-histories.index')}}" class="{{routeActive('training-histories*')}}">Riwayat Training</a></li>
                                {{-- <li><a href="{{route('skills-and-professions.index')}}" class="{{routeActive('skills-and-professions*')}}">Keahliaan & Profesi</a></li>
                                <li><a href="{{route('data-thps.index')}}" class="{{routeActive('data-thps*')}}">THP</a></li>
                                <li><a href="{{route('all-office-facilities.index')}}" class="{{routeActive('all-office-facilities*')}}">Fasilitas Jabatan</a></li>
                                <li><a href="{{route('insurance-facilities.index')}}" class="{{routeActive('insurance-facilities*')}}">Fasilitas Asuransi</a></li>
                                <li><a href="{{route('cash-benefits.index')}}" class="{{routeActive('cash-benefits*')}}">Cash Benefit</a></li> --}}
                                <li><a href="{{route('families.index')}}" class="{{routeActive('families*')}}">Data Keluarga</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('erp/procurement/') }}" href="javascript:void(0)"><i data-feather="home"></i><span>EPROC</span></a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('erp/procurement/') }};">
                                <li><a href="{{route('pr.index')}}" class="{{routeActive('pr*')}}">Purchase Request</a></li>
                            </ul>
                        </li>
                    @endcan
                    @can('master data')
                        <li class="sidebar-main-title">
                            <div>
                                <h6>Master Data</h6>
                            </div>
                        </li>
                    @can('roles and permissions')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('master_data/hris') }}" href="javascript:void(0)"><i data-feather="home"></i><span>Role Permissions</span></a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('master_data/hris') }};">
                                <li><a href="{{route('roles.index')}}" class="{{routeActive('roles*')}}">Roles</a></li>
                                <li><a href="{{route('permissions.index')}}" class="{{routeActive('permissions*')}}">Permissions</a></li>
                                <li><a href="{{route('assign.list')}}" class="{{routeActive('assign*')}}">Assigned User</a></li>
                                <li><a href="{{route('leader.index')}}" class="{{routeActive('leader*')}}">List Leader</a></li>
                            </ul>
                        </li>
                    @endcan

                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('master_data/hris') }}" href="javascript:void(0)"><i data-feather="home"></i><span>Data HRIS</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('master_data/hris') }};">
                            <li><a href="{{route('band-positions.index')}}" class="{{routeActive('band-positions*')}}">Band Position</a></li>
                            <li><a href="{{route('city-recuites.index')}}" class="{{routeActive('city-recuites*')}}">City Recruitment</a></li>
                            <li><a href="{{route('company-hosts.index')}}" class="{{routeActive('company-hosts*')}}">Company Host</a></li>
                            <li><a href="{{route('company-homes.index')}}" class="{{routeActive('company-homes*')}}">Company Home</a></li>
                            <li><a href="{{route('job-titles.index')}}" class="{{routeActive('job-titles*')}}">Job Titles</a></li>
                            <li><a href="{{route('job-grades.index')}}" class="{{routeActive('job-grades*')}}">Job Grade</a></li>
                            <li><a href="{{route('job-families.index')}}" class="{{routeActive('job-families*')}}">Job Family</a></li>
                            <li><a href="{{route('job-functions.index')}}" class="{{routeActive('job-functions*')}}">Job Function</a></li>
                            <li><a href="{{route('status-employees.index')}}" class="{{routeActive('status-employees*')}}">Status Employe</a></li>
                            <li><a href="{{route('edus.index')}}" class="{{routeActive('edus*')}}">Education</a></li>
                            <li><a href="{{route('sub-statuses.index')}}" class="{{routeActive('sub-statuses*')}}">Sub Status</a></li>
                            <li><a href="{{route('competence-fanctionals.index')}}" class="{{routeActive('competence-fanctionals*')}}">Competence Fanctional</a></li>
                            <li><a href="{{route('competence-core-values.index')}}" class="{{routeActive('competence-core-values*')}}">Competence Core Values</a></li>
                            <li><a href="{{route('competence-leaderships.index')}}" class="{{routeActive('competence-leaderships*')}}">Competence Leadership</a></li>
                            <li><a href="{{route('all-other-competencies.index')}}" class="{{routeActive('all-other-competencies*')}}">Competence Other</a></li>
                            {{-- <li><a href="{{route('jabatans.index')}}" class="{{routeActive('jabatans*')}}">Position</a></li> --}}
                            <li><a href="{{route('work-locations.index')}}" class="{{routeActive('work-locations*')}}">Work Location</a></li>
                            <li><a href="{{route('alamat-kerjas.index')}}" class="{{routeActive('alamat-kerjas*')}}">Address Location</a></li>
                            <li><a href="{{route('religions.index')}}" class="{{routeActive('religions*')}}">Religion</a></li>
                            <li><a href="{{route('provinces.index')}}" class="{{routeActive('provinces*')}}">Province</a></li>
                            <li><a href="{{route('regencies.index')}}" class="{{routeActive('regencies*')}}">Regency</a></li>
                            <li><a href="{{route('districts.index')}}" class="{{routeActive('districts*')}}">Districs</a></li>
                            <li><a href="{{route('villages.index')}}" class="{{routeActive('villages*')}}">Village</a></li>
                            <li><a href="{{route('direktorats.index')}}" class="{{routeActive('direktorats*')}}">Directorat</a></li>
                            <li><a href="{{route('departements.index')}}" class="{{routeActive('departements*')}}">Departement</a></li>
                            <li><a href="{{route('divisions.index')}}" class="{{routeActive('divisions*')}}">Division</a></li>
                            <li><a href="{{route('units.index')}}" class="{{routeActive('units*')}}">Unit</a></li>
                        </ul>
                    </li>
                    @endcan

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
