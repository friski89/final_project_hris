<x-admin-layout>
@section('title')@lang('crud.performance_appraisal_histories.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.performance_appraisal_histories.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.performance_appraisal_histories.name')</li>
    <li class="breadcrumb-item active">@lang('crud.performance_appraisal_histories.index_title')</li>
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.performance_appraisal_histories.index_title')
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
                        @can('create',
                        App\Models\PerformanceAppraisalHistory::class)
                        <a
                            href="{{ route('hrm.penilaian_kinerja.create') }}"
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
                                @lang('crud.performance_appraisal_histories.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.performance_appraisal_histories.inputs.employee_name')
                            </th>
                            <th class="text-right">
                                @lang('crud.performance_appraisal_histories.inputs.year')
                            </th>
                            <th class="text-left">
                                @lang('crud.performance_appraisal_histories.inputs.performance_value')
                            </th>
                            <th class="text-left">
                                @lang('crud.performance_appraisal_histories.inputs.performance_score')
                            </th>
                            <th class="text-left">
                                @lang('crud.performance_appraisal_histories.inputs.competency_value')
                            </th>
                            <th class="text-left">
                                @lang('crud.performance_appraisal_histories.inputs.behavioral_value')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($performanceAppraisalHistories as
                        $performanceAppraisalHistory)
                        <tr>
                            <td>
                                {{ $performanceAppraisalHistory->emp_no ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $performanceAppraisalHistory->employee_name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ $performanceAppraisalHistory->year ?? '-' }}
                            </td>
                            <td>
                                {{
                                $performanceAppraisalHistory->performance_value
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                $performanceAppraisalHistory->performance_score
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                $performanceAppraisalHistory->competency_value
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                $performanceAppraisalHistory->behavioral_value
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $performanceAppraisalHistory)
                                    <a
                                        href="{{ route('hrm.penilaian_kinerja.edit', $performanceAppraisalHistory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete',
                                    $performanceAppraisalHistory)
                                    <form
                                        action="{{ route('performance-appraisal-histories.destroy', $performanceAppraisalHistory) }}"
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
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                {!! $performanceAppraisalHistories->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
