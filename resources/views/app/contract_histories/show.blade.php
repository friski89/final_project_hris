<x-admin-layout>
    @section('title')@lang('crud.contract_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.contract_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.contract_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.contract_histories.show_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('contract-histories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.contract_histories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.contract_histories.inputs.tanggal')</h5>
                    <span>{{ $contractHistory->tanggal ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contract_histories.inputs.status')</h5>
                    <span>{{ $contractHistory->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contract_histories.inputs.user_id')</h5>
                    <span
                        >{{ optional($contractHistory->user)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('contract-histories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ContractHistory::class)
                <a
                    href="{{ route('contract-histories.create') }}"
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
