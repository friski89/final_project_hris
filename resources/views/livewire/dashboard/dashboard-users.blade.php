<div>
    @section('title')Dashboard
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>Dashboard Users</h3>
    @endslot
    <li class="breadcrumb-item active">Dashboard Users</li>
@endcomponent

<div class="container-fluid dashboard-default-sec">
    <div class="row">
        <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-3">
                    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
                        @foreach ($dataDirektorat as $item)
                        <li>
                            <input type="checkbox" wire:model="direktorats" , value="{{ $item->name }}" />
                            <span>{{ $item->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
                        @foreach ($dataJobTitle as $item)
                        <li>
                            <input type="checkbox" wire:model="jobTitle" , value="{{ $item->name }}" />
                            <span>{{ $item->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
                        @foreach ($dataStatusEmployee as $item)
                        <li>
                            <input type="checkbox" wire:model="statusEmployee" , value="{{ $item->name }}" />
                            <span>{{ $item->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
                        @foreach ($dataCompanyHome as $item)
                        <li>
                            <input type="checkbox" wire:model="companyHome" , value="{{ $item->name }}" />
                            <span>{{ $item->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-3">
                    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
                        @foreach ($dataWorkLocation as $item)
                        <li>
                            <input type="checkbox" wire:model="workLocation" , value="{{ $item->name }}" />
                            <span>{{ $item->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 box-col-12 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ count($employee) }}</h5>
                            <p>Total Keseluruhan Karyawan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ count($division) }}</h5>
                            <p>Total Division</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ count($departement) }}</h5>
                            <p>Total Departement</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i data-feather="users"></i>
                            </div>
                            <h5>{{ count($unit) }}</h5>
                            <p>Total Unit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 box-col-12 des-xl-100">
                <div class="row">
                    <div class="col-lg-4 py-4">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 25rem;">
                            <livewire:livewire-pie-chart key="{{ $direktoratChartModel->reactiveKey() }}" :pie-chart-model="$direktoratChartModel"/>
                        </div>
                    </div>
                    <div class="col-lg-4 py-4">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 25rem;">
                            <livewire:livewire-pie-chart key="{{ $jobChartModel->reactiveKey() }}" :pie-chart-model="$jobChartModel"/>
                        </div>
                    </div>
                    <div class="col-lg-4 py-4">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 25rem;">
                            <livewire:livewire-pie-chart key="{{ $statusChartModel->reactiveKey() }}" :pie-chart-model="$statusChartModel"/>
                        </div>
                    </div>
                    <div class="col-lg-4 py-4">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 25rem;">
                            <livewire:livewire-pie-chart key="{{ $locationChartModel->reactiveKey() }}" :pie-chart-model="$locationChartModel"/>
                        </div>
                    </div>
                    <div class="col-lg-4 py-4">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 25rem;">
                            <livewire:livewire-pie-chart key="{{ $companyChartModel->reactiveKey() }}" :pie-chart-model="$companyChartModel"/>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

</div>

