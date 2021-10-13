<x-admin-layout>
    @section('title')@lang('crud.competence_leaderships.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.competence_leaderships.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.competence_leaderships.name')</li>
        <li class="breadcrumb-item active">@lang('crud.competence_leaderships.edit_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('competence-leaderships.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.competence_leaderships.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('competence-leaderships.update', $competenceLeadership) }}"
                class="mt-4"
            >
                @include('app.competence_leaderships.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('competence-leaderships.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('competence-leaderships.create') }}"
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
