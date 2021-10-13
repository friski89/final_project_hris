<x-admin-layout>
    @section('title')@lang('crud.all_office_facilities.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.all_office_facilities.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.all_office_facilities.name')</li>
        <li class="breadcrumb-item active">@lang('crud.all_office_facilities.show_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a
                        href="{{ route('all-office-facilities.index') }}"
                        class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.all_office_facilities.show_title')
                </h4>

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.all_office_facilities.inputs.user_id')</h5>
                        <span
                            >{{ optional($officeFacilities->user)->name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.all_office_facilities.inputs.emp_no')</h5>
                        <span>{{ $officeFacilities->emp_no ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>
                            @lang('crud.all_office_facilities.inputs.employee_name')
                        </h5>
                        <span>{{ $officeFacilities->employee_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>
                            @lang('crud.all_office_facilities.inputs.jenis_fasilitas')
                        </h5>
                        <span>{{ $officeFacilities->jenis_fasilitas ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>
                            @lang('crud.all_office_facilities.inputs.jenis_pemberian')
                        </h5>
                        <span>{{ $officeFacilities->jenis_pemberian ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>
                            @lang('crud.all_office_facilities.inputs.nilai_perolehan')
                        </h5>
                        <span>{{ $officeFacilities->nilai_perolehan ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.all_office_facilities.inputs.date')</h5>
                        <span>{{ $officeFacilities->date ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <a
                        href="{{ route('all-office-facilities.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\OfficeFacilities::class)
                    <a
                        href="{{ route('all-office-facilities.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add"></i> @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
