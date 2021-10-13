<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">

        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            admedika-rev
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', App\Models\CityRecuite::class)
                            <a class="dropdown-item" href="{{ route('city-recuites.index') }}">City Recuites</a>
                            @endcan
                            @can('view-any', App\Models\CompanyHost::class)
                            <a class="dropdown-item" href="{{ route('company-hosts.index') }}">Company Hosts</a>
                            @endcan
                            @can('view-any', App\Models\JobTitle::class)
                            <a class="dropdown-item" href="{{ route('job-titles.index') }}">Job Titles</a>
                            @endcan
                            @can('view-any', App\Models\CompanyHome::class)
                            <a class="dropdown-item" href="{{ route('company-homes.index') }}">Company Homes</a>
                            @endcan
                            @can('view-any', App\Models\JobGrade::class)
                            <a class="dropdown-item" href="{{ route('job-grades.index') }}">Job Grades</a>
                            @endcan
                            @can('view-any', App\Models\JobFamily::class)
                            <a class="dropdown-item" href="{{ route('job-families.index') }}">Job Families</a>
                            @endcan
                            @can('view-any', App\Models\JobFunction::class)
                            <a class="dropdown-item" href="{{ route('job-functions.index') }}">Job Functions</a>
                            @endcan
                            @can('view-any', App\Models\StatusEmployee::class)
                            <a class="dropdown-item" href="{{ route('status-employees.index') }}">Status Employees</a>
                            @endcan
                            @can('view-any', App\Models\Edu::class)
                            <a class="dropdown-item" href="{{ route('edus.index') }}">Edus</a>
                            @endcan
                            @can('view-any', App\Models\SubStatus::class)
                            <a class="dropdown-item" href="{{ route('sub-statuses.index') }}">Sub Statuses</a>
                            @endcan
                            @can('view-any', App\Models\CompetenceFanctional::class)
                            <a class="dropdown-item" href="{{ route('competence-fanctionals.index') }}">Competence Fanctionals</a>
                            @endcan
                            @can('view-any', App\Models\CompetenceCoreValue::class)
                            <a class="dropdown-item" href="{{ route('competence-core-values.index') }}">Competence Core Values</a>
                            @endcan
                            @can('view-any', App\Models\CompetenceLeadership::class)
                            <a class="dropdown-item" href="{{ route('competence-leaderships.index') }}">Competence Leaderships</a>
                            @endcan
                            @can('view-any', App\Models\ServiceHistory::class)
                            <a class="dropdown-item" href="{{ route('service-histories.index') }}">Service Histories</a>
                            @endcan
                            @can('view-any', App\Models\AssignmentHistory::class)
                            <a class="dropdown-item" href="{{ route('assignment-histories.index') }}">Assignment Histories</a>
                            @endcan
                            @can('view-any', App\Models\TrainingHistory::class)
                            <a class="dropdown-item" href="{{ route('training-histories.index') }}">Training Histories</a>
                            @endcan
                            @can('view-any', App\Models\SkillsAndProfession::class)
                            <a class="dropdown-item" href="{{ route('skills-and-professions.index') }}">Skills And Professions</a>
                            @endcan
                            @can('view-any', App\Models\DataThp::class)
                            <a class="dropdown-item" href="{{ route('data-thps.index') }}">Data Thps</a>
                            @endcan
                            @can('view-any', App\Models\OfficeFacilities::class)
                            <a class="dropdown-item" href="{{ route('all-office-facilities.index') }}">All Office Facilities</a>
                            @endcan
                            @can('view-any', App\Models\InsuranceFacility::class)
                            <a class="dropdown-item" href="{{ route('insurance-facilities.index') }}">Insurance Facilities</a>
                            @endcan
                            @can('view-any', App\Models\CashBenefit::class)
                            <a class="dropdown-item" href="{{ route('cash-benefits.index') }}">Cash Benefits</a>
                            @endcan
                            @can('view-any', App\Models\EducationalBackground::class)
                            <a class="dropdown-item" href="{{ route('educational-backgrounds.index') }}">Educational Backgrounds</a>
                            @endcan
                            @can('view-any', App\Models\BandPosition::class)
                            <a class="dropdown-item" href="{{ route('band-positions.index') }}">Band Positions</a>
                            @endcan
                            @can('view-any', App\Models\OtherCompetencies::class)
                            <a class="dropdown-item" href="{{ route('all-other-competencies.index') }}">All Other Competencies</a>
                            @endcan
                            @can('view-any', App\Models\Jabatan::class)
                            <a class="dropdown-item" href="{{ route('jabatans.index') }}">Jabatans</a>
                            @endcan
                            @can('view-any', App\Models\WorkLocation::class)
                            <a class="dropdown-item" href="{{ route('work-locations.index') }}">Work Locations</a>
                            @endcan
                            @can('view-any', App\Models\AlamatKerja::class)
                            <a class="dropdown-item" href="{{ route('alamat-kerjas.index') }}">Alamat Kerjas</a>
                            @endcan
                            @can('view-any', App\Models\ContractHistory::class)
                            <a class="dropdown-item" href="{{ route('contract-histories.index') }}">Contract Histories</a>
                            @endcan
                            @can('view-any', App\Models\Family::class)
                            <a class="dropdown-item" href="{{ route('families.index') }}">Families</a>
                            @endcan
                            @can('view-any', App\Models\Religion::class)
                            <a class="dropdown-item" href="{{ route('religions.index') }}">Religions</a>
                            @endcan
                            @can('view-any', App\Models\Village::class)
                            <a class="dropdown-item" href="{{ route('villages.index') }}">Villages</a>
                            @endcan
                            @can('view-any', App\Models\District::class)
                            <a class="dropdown-item" href="{{ route('districts.index') }}">Districts</a>
                            @endcan
                            @can('view-any', App\Models\Regencie::class)
                            <a class="dropdown-item" href="{{ route('regencies.index') }}">Regencies</a>
                            @endcan
                            @can('view-any', App\Models\Province::class)
                            <a class="dropdown-item" href="{{ route('provinces.index') }}">Provinces</a>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                            @endcan
                            @can('view-any', App\Models\EmergencyContact::class)
                            <a class="dropdown-item" href="{{ route('emergency-contacts.index') }}">Emergency Contacts</a>
                            @endcan
                            @can('view-any', App\Models\Profile::class)
                            <a class="dropdown-item" href="{{ route('profiles.index') }}">Profiles</a>
                            @endcan
                            @can('view-any', App\Models\Direktorat::class)
                            <a class="dropdown-item" href="{{ route('direktorats.index') }}">Direktorats</a>
                            @endcan
                            @can('view-any', App\Models\Departement::class)
                            <a class="dropdown-item" href="{{ route('departements.index') }}">Departements</a>
                            @endcan
                            @can('view-any', App\Models\Division::class)
                            <a class="dropdown-item" href="{{ route('divisions.index') }}">Divisions</a>
                            @endcan
                            @can('view-any', App\Models\Unit::class)
                            <a class="dropdown-item" href="{{ route('units.index') }}">Units</a>
                            @endcan
                        </div>

                    </li>
                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Access Management <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', Spatie\Permission\Models\Role::class)
                            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                            @endcan

                            @can('view-any', Spatie\Permission\Models\Permission::class)
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                            @endcan
                        </div>
                    </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
