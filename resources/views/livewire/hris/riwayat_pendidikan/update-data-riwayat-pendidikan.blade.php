<div>
    @section('title')@lang('crud.families.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.families.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.families.name')</li>
        <li class="breadcrumb-item active">@lang('crud.families.edit_title')</li>
    @endcomponent
    <div class="container">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <a href="{{ route('users.index') }}" class="mr-4"
                            ><i class="icon ion-md-arrow-back"></i
                        ></a>
                        @lang('crud.educational_backgrounds.create_title')
                    </h4>
                </div>
                <form autocomplete="off" wire:submit.prevent="updateForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-between">
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
                                    <label for="religion">Educational</label>
                                    <select wire:model="state.edu_id" class="form-control @error('edu_id') is-invalid @enderror" id="edu_id" >
                                        <option value="">-- Select Educational --</option>
                                        @foreach($edus as $value => $label)
                                        <option value="{{ $value }}" >{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('edu_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="institution_name">Institution Name</label>
                                    <input type="text" wire:model="state.institution_name" class="form-control @error('institution_name') is-invalid @enderror" id="institution_name" placeholder="Enter Institution Name">
                                    @error('institution_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="faculty">Faculty</label>
                                    <input type="text" wire:model="state.faculty" class="form-control @error('faculty') is-invalid @enderror" id="faculty" placeholder="Enter Faculty">
                                    @error('faculty')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="major">Major</label>
                                    <input type="text" wire:model="state.major" class="form-control @error('major') is-invalid @enderror" id="major" placeholder="Enter Major">
                                    @error('major')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="graduate_date">Graduate Date</label>
                                    <input type="date" wire:model="state.graduate_date" class="form-control @error('graduate_date') is-invalid @enderror" id="graduate_date" placeholder="Enter Graduate Date">
                                    @error('graduate_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cost_category">Cost Category</label>
                                    <input type="text" wire:model="state.cost_category" class="form-control @error('cost_category') is-invalid @enderror" id="cost_category" placeholder="Enter Cost Category (Pribadi, Beasiswa, dll)">
                                    @error('cost_category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gpa">GPA (IPK)</label>
                                    <input type="text" wire:model="state.gpa" class="form-control @error('gpa') is-invalid @enderror" id="gpa" placeholder="Enter GPA (3.4)">
                                    @error('gpa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gpa">GPA Scale</label>
                                    <input type="text" wire:model="state.gpa_scale" class="form-control @error('gpa_scale') is-invalid @enderror" id="gpa_scale" placeholder="Enter GPA Scale (default in indonesia is 4.0)">
                                    @error('gpa_scale')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_year">Start Year</label>
                                    <input type="text" wire:model="state.start_year" class="form-control @error('gpa_scale') is-invalid @enderror" id="start_year" placeholder="Enter Start Year">
                                    @error('start_year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" wire:model="state.city" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Enter City">
                                    @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" wire:model="state.state" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="Enter State">
                                    @error('state')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">County</label>
                                    <input type="text" wire:model="state.country" class="form-control @error('country') is-invalid @enderror" id="country" placeholder="Enter Country">
                                    @error('country')
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
                            <a href="{{ route('families.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
