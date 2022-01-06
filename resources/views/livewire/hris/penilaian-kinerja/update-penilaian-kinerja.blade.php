<div>
    @section('title')@lang('crud.performance_appraisal_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.performance_appraisal_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.performance_appraisal_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.performance_appraisal_histories.edit_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('performance-appraisal-histories.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.performance_appraisal_histories.edit_title')
                </h4>
            </div>
            <form autocomplete="off" wire:submit.prevent="updateForm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="emp_no">Employe Number</label>
                                <input readonly type="text" wire:model="state.emp_no" class="form-control @error('emp_no') is-invalid @enderror" id="emp_no" placeholder="Employee Number">
                                <input type="hidden" wire:model="state.user_id" class="form-control">
                                @error('emp_no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="employee_name">Employee Name</label>
                                <input readonly type="text" wire:model="state.employee_name" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" placeholder="Enter Employee Name">
                                @error('employee_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="number" wire:model="state.year" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="Enter Year">
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="performance_value">Performance Value</label>
                                <input type="text" wire:model="state.performance_value" class="form-control @error('performance_value') is-invalid @enderror" id="performance_value" placeholder="Enter Performance Value">
                                @error('performance_value')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="performance_score">Performance Score</label>
                                <input type="text" wire:model="state.performance_score" class="form-control @error('performance_score') is-invalid @enderror" id="performance_score" placeholder="Enter Performance Score">
                                @error('performance_score')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="competency_value">Competency Value</label>
                                <input type="text" wire:model="state.competency_value" class="form-control @error('competency_value') is-invalid @enderror" id="competency_value" placeholder="Enter Competency Value">
                                @error('competency_value')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="behavioral_value">Behavioral Value</label>
                                <input type="text" wire:model="state.behavioral_value" class="form-control @error('behavioral_value') is-invalid @enderror" id="behavioral_value" placeholder="Enter Behavioral Value">
                                @error('behavioral_value')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <a href="{{ route('performance-appraisal-histories.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
