<x-admin-layout>
    @section('title')@lang('crud.city_recuites.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.city_recuites.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.city_recuites.name')</li>
        <li class="breadcrumb-item active">@lang('crud.city_recuites.create_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('city-recuites.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.city_recuites.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('city-recuites.store') }}"
                class="mt-4"
            >
                @include('app.city_recuites.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('city-recuites.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.create')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
</x-admin-layout>
