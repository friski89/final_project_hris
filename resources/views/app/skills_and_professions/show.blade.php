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
                <a
                    href="{{ route('skills-and-professions.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.skills_and_professions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.skills_and_professions.inputs.user_id')</h5>
                    <span
                        >{{ optional($skillsAndProfession->user)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.skills_and_professions.inputs.emp_no')</h5>
                    <span>{{ $skillsAndProfession->emp_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.employee_name')
                    </h5>
                    <span
                        >{{ $skillsAndProfession->employee_name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.certificate_name')
                    </h5>
                    <span
                        >{{ $skillsAndProfession->certificate_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.institution')
                    </h5>
                    <span>{{ $skillsAndProfession->institution ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.start_date')
                    </h5>
                    <span>{{ $skillsAndProfession->start_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.end_date')
                    </h5>
                    <span>{{ $skillsAndProfession->end_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.other_competencies_id')
                    </h5>
                    <span
                        >{{
                        optional($skillsAndProfession->otherCompetencies)->name
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.competence_fanctional_id')
                    </h5>
                    <span
                        >{{
                        optional($skillsAndProfession->competenceFanctional)->name
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.competence_leadership_id')
                    </h5>
                    <span
                        >{{
                        optional($skillsAndProfession->competenceLeadership)->name
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.skills_and_professions.inputs.competence_core_value_id')
                    </h5>
                    <span
                        >{{
                        optional($skillsAndProfession->competenceCoreValue)->name
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('skills-and-professions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\SkillsAndProfession::class)
                <a
                    href="{{ route('skills-and-professions.create') }}"
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
