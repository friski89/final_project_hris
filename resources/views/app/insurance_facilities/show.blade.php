<x-admin-layout>
    @section('title')@lang('crud.achievement_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.achievement_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.achievement_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.achievement_histories.show_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('insurance-facilities.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.insurance_facilities.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.insurance_facilities.inputs.user_id')</h5>
                    <span
                        >{{ optional($insuranceFacility->user)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.insurance_facilities.inputs.emp_no')</h5>
                    <span>{{ $insuranceFacility->emp_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.insurance_facilities.inputs.employee_name')
                    </h5>
                    <span>{{ $insuranceFacility->employee_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.insurance_facilities.inputs.jenis_asuransi')
                    </h5>
                    <span>{{ $insuranceFacility->jenis_asuransi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.insurance_facilities.inputs.provider_asuransi')
                    </h5>
                    <span
                        >{{ $insuranceFacility->provider_asuransi ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.insurance_facilities.inputs.nama_peserta')
                    </h5>
                    <span>{{ $insuranceFacility->nama_peserta ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.insurance_facilities.inputs.status_peserta')
                    </h5>
                    <span>{{ $insuranceFacility->status_peserta ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.insurance_facilities.inputs.date')</h5>
                    <span>{{ $insuranceFacility->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.insurance_facilities.inputs.peserta_manfaat')
                    </h5>
                    <span
                        >{{ $insuranceFacility->peserta_manfaat ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('insurance-facilities.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\InsuranceFacility::class)
                <a
                    href="{{ route('insurance-facilities.create') }}"
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
