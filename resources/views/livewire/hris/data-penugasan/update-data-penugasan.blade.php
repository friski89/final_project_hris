<div>
    @section('title')@lang('crud.assignment_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.assignment_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.assignment_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.assignment_histories.edit_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('assignment-histories.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.assignment_histories.edit_title')
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
                                <label for="date">Date Assignment</label>
                                <input type="date" wire:model="state.date" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="DD-MM-YYYY">
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="company_home_id">Company Home</label>
                                <select readonly wire:model="state.company_home_id" class="form-control @error('company_home_id') is-invalid @enderror" id="company_home_id" >
                                    <option value="" selected>Company Home</option>
                                    @foreach($companyHomes as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('company_home_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="job_title_id">Jabatan</label>
                                <select readonly wire:model="state.job_title_id" class="form-control @error('job_title_id') is-invalid @enderror" id="job_title_id" >
                                    <option value="" selected>Jabatan</option>
                                    @foreach($jobTitles as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('job_title_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="assignment_name">Nama Penugasan</label>
                                <textarea wire:model="state.assignment_name" id="assignment_name" class="form-control @error('assignment_name') is-invalid @enderror"></textarea>
                                @error('assignment_name')
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
                        <a href="{{ route('assignment-histories.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
