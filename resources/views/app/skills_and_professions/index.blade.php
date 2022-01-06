<x-admin-layout>
@section('title')@lang('crud.achievement_histories.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.achievement_histories.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.achievement_histories.name')</li>
    <li class="breadcrumb-item active">@lang('crud.achievement_histories.index_title')</li>
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.skills_and_professions.index_title')
                </h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\SkillsAndProfession::class)
                        <a
                            href="{{ route('skills-and-professions.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.certificate_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.institution')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.start_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.end_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.other_competencies_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.competence_fanctional_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.competence_leadership_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.skills_and_professions.inputs.competence_core_value_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skillsAndProfessions as $skillsAndProfession)
                        <tr>
                            <td>
                                {{ optional($skillsAndProfession->user)->name ??
                                '-' }}
                            </td>
                            <td>{{ $skillsAndProfession->emp_no ?? '-' }}</td>
                            <td>
                                {{ $skillsAndProfession->employee_name ?? '-' }}
                            </td>
                            <td>
                                {{ $skillsAndProfession->certificate_name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $skillsAndProfession->institution ?? '-' }}
                            </td>
                            <td>
                                {{ $skillsAndProfession->start_date ?? '-' }}
                            </td>
                            <td>{{ $skillsAndProfession->end_date ?? '-' }}</td>
                            <td>
                                {{
                                optional($skillsAndProfession->otherCompetencies)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($skillsAndProfession->competenceFanctional)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($skillsAndProfession->competenceLeadership)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($skillsAndProfession->competenceCoreValue)->name
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $skillsAndProfession)
                                    <a
                                        href="{{ route('skills-and-professions.edit', $skillsAndProfession) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $skillsAndProfession)
                                    <a
                                        href="{{ route('skills-and-professions.show', $skillsAndProfession) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $skillsAndProfession)
                                    <form
                                        action="{{ route('skills-and-professions.destroy', $skillsAndProfession) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                {!! $skillsAndProfessions->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
