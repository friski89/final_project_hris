<x-admin-layout>
    @section('title')@lang('crud.all_other_competencies.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.all_other_competencies.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.all_other_competencies.name')</li>
        <li class="breadcrumb-item active">@lang('crud.all_other_competencies.edit_title')</li>
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
                    @lang('crud.all_other_competencies.edit_title')
                </h4>

                <x-form
                    method="PUT"
                    action="{{ route('all-other-competencies.update', $otherCompetencies) }}"
                    class="mt-4"
                >
                    @include('app.all_other_competencies.form-inputs')

                    <div class="mt-4">
                        <a
                            href="{{ route('all-other-competencies.index') }}"
                            class="btn btn-light"
                        >
                            <i class="icon ion-md-return-left text-primary"></i>
                            @lang('crud.common.back')
                        </a>

                        <a
                            href="{{ route('all-other-competencies.create') }}"
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
