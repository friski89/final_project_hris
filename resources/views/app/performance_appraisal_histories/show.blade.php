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
                    href="{{ route('performance-appraisal-histories.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.performance_appraisal_histories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.emp_no')
                    </h5>
                    <span
                        >{{ $performanceAppraisalHistory->emp_no ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.employee_name')
                    </h5>
                    <span
                        >{{ $performanceAppraisalHistory->employee_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.year')
                    </h5>
                    <span>{{ $performanceAppraisalHistory->year ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.performance_value')
                    </h5>
                    <span
                        >{{ $performanceAppraisalHistory->performance_value ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.performance_score')
                    </h5>
                    <span
                        >{{ $performanceAppraisalHistory->performance_score ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.competency_value')
                    </h5>
                    <span
                        >{{ $performanceAppraisalHistory->competency_value ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.behavioral_value')
                    </h5>
                    <span
                        >{{ $performanceAppraisalHistory->behavioral_value ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.performance_appraisal_histories.inputs.user_id')
                    </h5>
                    <span
                        >{{ optional($performanceAppraisalHistory->user)->name
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('performance-appraisal-histories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\PerformanceAppraisalHistory::class)
                <a
                    href="{{ route('performance-appraisal-histories.create') }}"
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
