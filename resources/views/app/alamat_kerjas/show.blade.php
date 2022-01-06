<x-admin-layout>
    @section('title')@lang('crud.alamat_kerjas.inputs.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.alamat_kerjas.inputs.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.alamat_kerjas.inputs.name')</li>
        <li class="breadcrumb-item active">@lang('crud.alamat_kerjas.inputs.show_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('alamat-kerjas.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.alamat_kerjas.show_title')
                </h4>

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.alamat_kerjas.inputs.name')</h5>
                        <span>{{ $alamatKerja->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.alamat_kerjas.inputs.work_location_id')</h5>
                        <span
                            >{{ optional($alamatKerja->workLocation)->name ?? '-'
                            }}</span
                        >
                    </div>
                </div>

                <div class="mt-4">
                    <a
                        href="{{ route('alamat-kerjas.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\AlamatKerja::class)
                    <a
                        href="{{ route('alamat-kerjas.create') }}"
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
