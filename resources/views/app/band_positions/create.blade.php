<x-admin-layout>
    @section('title')@lang('crud.band_positions.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.band_positions.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.band_positions.name')</li>
        <li class="breadcrumb-item active">@lang('crud.band_positions.create_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('band-positions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.band_positions.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('band-positions.store') }}"
                class="mt-4"
            >
                @include('app.band_positions.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('band-positions.index') }}"
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
