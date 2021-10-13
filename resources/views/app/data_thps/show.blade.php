<x-admin-layout>
    @section('title')@lang('crud.data_thps.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.data_thps.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.data_thps.name')</li>
        <li class="breadcrumb-item active">@lang('crud.data_thps.show_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('data-thps.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.data_thps.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.emp_no')</h5>
                    <span>{{ $dataThp->emp_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.employee_name')</h5>
                    <span>{{ $dataThp->employee_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.base_salary')</h5>
                    <span>{{ $dataThp->base_salary ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.tunjangan_jabatan')</h5>
                    <span>{{ $dataThp->tunjangan_jabatan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.tunjangan_fixed')</h5>
                    <span>{{ $dataThp->tunjangan_fixed ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.based_jamsostek')</h5>
                    <span>{{ $dataThp->based_jamsostek ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.no_jamsostek')</h5>
                    <span>{{ $dataThp->no_jamsostek ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.no_bpjs')</h5>
                    <span>{{ $dataThp->no_bpjs ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.no_npwp')</h5>
                    <span>{{ $dataThp->no_npwp ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.status_pajak')</h5>
                    <span>{{ $dataThp->status_pajak ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.no_rekening')</h5>
                    <span>{{ $dataThp->no_rekening ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.nama_bank')</h5>
                    <span>{{ $dataThp->nama_bank ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.nama_pemilik')</h5>
                    <span>{{ $dataThp->nama_pemilik ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_thps.inputs.user_id')</h5>
                    <span>{{ optional($dataThp->user)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('data-thps.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\DataThp::class)
                <a href="{{ route('data-thps.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
