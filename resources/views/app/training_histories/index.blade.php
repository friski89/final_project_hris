<x-admin-layout>
@section('title')@lang('crud.training_histories.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.training_histories.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.training_histories.name')</li>
    <li class="breadcrumb-item active">@lang('crud.training_histories.index_title')</li>
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.training_histories.index_title')
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
                        @can('create', App\Models\TrainingHistory::class)
                        <a
                            href="{{ route('hrm.riwayat_training.create') }}"
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
                <table class="table table-borderless table-head-fixed text-nowrap table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.training_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.institution')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.start_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.years_of_training')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.training_duration')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.end_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.training_force')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.rating')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.trnevent_topic')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.trncourse_cost')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.trnevent_type')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.trn_flag')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.other_competencies_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.competence_fanctional_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.competence_leadership_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.training_histories.inputs.competence_core_value_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($trainingHistories as $trainingHistory)
                        <tr>
                            <td>{{ $trainingHistory->emp_no ?? '-' }}</td>
                            <td>
                                {{ $trainingHistory->employee_name ?? '-' }}
                            </td>
                            <td>
                                {{ $trainingHistory->training_name ?? '-' }}
                            </td>
                            <td>{{ $trainingHistory->institution ?? '-' }}</td>
                            <td>{{ $trainingHistory->start_date ?? '-' }}</td>
                            <td>
                                {{ $trainingHistory->years_of_training ?? '-' }}
                            </td>
                            <td>
                                {{ $trainingHistory->training_duration ?? '-' }}
                            </td>
                            <td>{{ $trainingHistory->end_date ?? '-' }}</td>
                            <td>
                                {{ $trainingHistory->training_force ?? '-' }}
                            </td>
                            <td>{{ $trainingHistory->rating ?? '-' }}</td>
                            <td>
                                {{ $trainingHistory->trnevent_topic ?? '-' }}
                            </td>
                            <td>
                                {{ $trainingHistory->trncourse_cost ?? '-' }}
                            </td>
                            <td>
                                {{ $trainingHistory->trnevent_type ?? '-' }}
                            </td>
                            <td>{{ $trainingHistory->trn_flag ?? '-' }}</td>
                            <td>
                                {{
                                optional($trainingHistory->otherCompetencies)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($trainingHistory->competenceFanctional)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($trainingHistory->competenceLeadership)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($trainingHistory->competenceCoreValue)->name
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $trainingHistory)
                                    <a
                                        href="{{ route('hrm.riwayat_training.edit', $trainingHistory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $trainingHistory)
                                    <form
                                        action="{{ route('training-histories.destroy', $trainingHistory) }}"
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
                            <td colspan="20">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="20">
                                {!! $trainingHistories->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
