<x-admin-layout>
    @section('title')@lang('crud.cash_benefits.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.cash_benefits.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.cash_benefits.name')</li>
        <li class="breadcrumb-item active">@lang('crud.cash_benefits.show_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('cash-benefits.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cash_benefits.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.cash_benefits.inputs.user_id')</h5>
                    <span>{{ optional($cashBenefit->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cash_benefits.inputs.emp_no')</h5>
                    <span>{{ $cashBenefit->emp_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cash_benefits.inputs.employee_name')</h5>
                    <span>{{ $cashBenefit->employee_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cash_benefits.inputs.jenis_benefit')</h5>
                    <span>{{ $cashBenefit->jenis_benefit ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cash_benefits.inputs.nilai_benefit')</h5>
                    <span>{{ $cashBenefit->nilai_benefit ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cash_benefits.inputs.date')</h5>
                    <span>{{ $cashBenefit->date ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('cash-benefits.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\CashBenefit::class)
                <a
                    href="{{ route('cash-benefits.create') }}"
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
