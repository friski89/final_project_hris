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
                <a href="{{ route('villages.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.villages.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.villages.inputs.name')</h5>
                    <span>{{ $village->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.villages.inputs.district_id')</h5>
                    <span>{{ optional($village->district)->name ?? '-' }}</span>
                </div>
                {{-- <div class="mb-4">
                    <h5>@lang('crud.villages.inputs.kode_pos')</h5>
                    <span>{{ $village->kode_pos ?? '-' }}</span>
                </div> --}}
            </div>

            <div class="mt-4">
                <a href="{{ route('villages.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Village::class)
                <a href="{{ route('villages.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-admin-layout>


