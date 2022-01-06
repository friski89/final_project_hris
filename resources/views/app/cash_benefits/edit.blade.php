<x-admin-layout>
    @section('title')@lang('crud.cash_benefits.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.cash_benefits.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.cash_benefits.name')</li>
        <li class="breadcrumb-item active">@lang('crud.cash_benefits.edit_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('cash-benefits.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cash_benefits.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('cash-benefits.update', $cashBenefit) }}"
                class="mt-4"
            >
                @include('app.cash_benefits.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('cash-benefits.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('cash-benefits.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
</x-admin-layout>
