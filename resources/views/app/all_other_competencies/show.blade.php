<x-admin-layout>
    @section('title')@lang('crud.all_other_competencies.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.all_other_competencies.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.all_other_competencies.name')</li>
        <li class="breadcrumb-item active">@lang('crud.all_other_competencies.show_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a
                        href="{{ route('all-other-competencies.index') }}"
                        class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.all_other_competencies.show_title')
                </h4>

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.all_other_competencies.inputs.name')</h5>
                        <span>{{ $otherCompetencies->name ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <a
                        href="{{ route('all-other-competencies.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\OtherCompetencies::class)
                    <a
                        href="{{ route('all-other-competencies.create') }}"
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
