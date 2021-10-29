<div>
    @section('title')@lang('crud.service_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.service_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.service_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.service_histories.edit_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('service-histories.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.service_histories.edit_title')
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
                                <label for="emoloyee_name">Employee Name</label>
                                <input readonly type="text" wire:model="state.emoloyee_name" class="form-control @error('emoloyee_name') is-invalid @enderror" id="emoloyee_name" placeholder="Enter Employee Name">
                                @error('emoloyee_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="company_host_id">Company Host</label>
                                <select readonly wire:model="state.company_host_id" class="form-control @error('company_host_id') is-invalid @enderror" id="company_host_id" >
                                    <option value="" selected>Company Host</option>
                                    @foreach($companyHosts as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('company_host_id')
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
                                <label for="band_position_id">Band Position</label>
                                <select readonly wire:model="state.band_position_id" class="form-control @error('band_position_id') is-invalid @enderror" id="band_position_id" >
                                    <option value="" selected>Band Position</option>
                                    @foreach($bandPositions as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('band_position_id')
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
                                <label for="start_date">Start Date</label>
                                <input type="date" wire:model="state.start_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" placeholder="DD-MM-YYYY">
                                @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" wire:model="state.end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" placeholder="DD-MM-YYYY">
                                @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Jenis Pergerakan</label>
                                <textarea wire:model="state.type" id="type" class="form-control @error('type') is-invalid @enderror"></textarea>
                                @error('type')
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
                        <a href="{{ route('service-histories.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
