<div>
    @section('title')@lang('crud.achievement_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.achievement_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.achievement_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.achievement_histories.edit_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('achievement-histories.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.achievement_histories.edit_title')
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
                                <label for="date">Date</label>
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
                                <label for="award_name">Award Name</label>
                                <input type="text" wire:model="state.award_name" class="form-control @error('award_name') is-invalid @enderror" id="award_name" placeholder="Enter Award Name">
                                @error('award_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="institution">Institution</label>
                                <input type="text" wire:model="state.institution" class="form-control @error('institution') is-invalid @enderror" id="institution" placeholder="Enter Institution">
                                @error('institution')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_sk">No SK</label>
                                <input type="text" wire:model="state.no_sk" class="form-control @error('no_sk') is-invalid @enderror" id="no_sk" placeholder="Enter No SK">
                                @error('no_sk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="office_name">Institusi Yang Memberikan</label>
                                <input type="text" wire:model="state.office_name" class="form-control @error('office_name') is-invalid @enderror" id="office_name" placeholder="Enter Institusi Yang Memberikan">
                                @error('office_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="position_name">Posisi Penjabat</label>
                                <input type="text" wire:model="state.position_name" class="form-control @error('position_name') is-invalid @enderror" id="position_name" placeholder="Enter Posisi Penjabat">
                                @error('position_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea wire:model="state.remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror"></textarea>
                                @error('remarks')
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
                        <a href="{{ route('achievement-histories.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
