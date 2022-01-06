<x-admin-layout>
    @section('title')@lang('crud.alamat_kerjas.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.alamat_kerjas.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.alamat_kerjas.name')</li>
        <li class="breadcrumb-item active">@lang('crud.alamat_kerjas.create_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('alamat-kerjas.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.alamat_kerjas.create_title')
                </h4>

                <x-form
                    method="POST"
                    action="{{ route('alamat-kerjas.store') }}"
                    class="mt-4"
                >
                    @include('app.alamat_kerjas.form-inputs')

                    <div class="mt-4">
                        <a
                            href="{{ route('alamat-kerjas.index') }}"
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
