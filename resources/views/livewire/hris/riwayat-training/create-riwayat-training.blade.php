<div>
    @section('title')@lang('crud.training_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.training_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.training_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.training_histories.create_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('training-histories.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.training_histories.create_title')
                </h4>
            </div>
            <form autocomplete="off" wire:submit.prevent="createForm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="emp_no">Employe Number</label>
                                    <input type="text" wire:model="state.emp_no" class="form-control @error('emp_no') is-invalid @enderror" id="emp_no" placeholder="Employee Number">
                                    <input type="hidden" wire:model="state.user_id" class="form-control">
                                    @error('emp_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mx-auto my-auto">
                                    <button wire:click.prevent="searchEmploye()" class="btn btn-info">Search</button>
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
                                <label for="training_name">Nama Pelatihan</label>
                                <input type="text" wire:model="state.training_name" class="form-control @error('training_name') is-invalid @enderror" id="training_name" placeholder="Nama Pelatihan">
                                @error('training_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="institution">Institusi Penyelenggara</label>
                                <input type="text" wire:model="state.institution" class="form-control @error('institution') is-invalid @enderror" id="institution" placeholder="Institusi Penyelenggara">
                                @error('institution')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_date">Tanggal Mulai Pelatihan</label>
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
                                <label for="end_date">Tanggal Akhir Pelatihan</label>
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
                                <label for="years_of_training">Tahun Pelatihan</label>
                                <input type="text" wire:model="state.years_of_training" class="form-control @error('years_of_training') is-invalid @enderror" id="years_of_training" placeholder="Enter Tahun Pelatihan">
                                @error('years_of_training')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="training_duration">Durasi Pelatihan</label>
                                <input type="text" wire:model="state.training_duration" class="form-control @error('training_duration') is-invalid @enderror" id="training_duration" placeholder="Enter Durasi Pelatihan">
                                @error('training_duration')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="training_force">Angkatan Pelatihan</label>
                                <input type="text" wire:model="state.training_force" class="form-control @error('training_force') is-invalid @enderror" id="training_force" placeholder="Enter Angkatan Pelatihan">
                                @error('training_force')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="competence_core_value_id">KOMPETENSI CORE VALUES</label>
                                <select wire:model="state.competence_core_value_id" class="form-control @error('competence_core_value_id') is-invalid @enderror" id="competence_core_value_id" >
                                    <option value="" selected>KOMPETENSI CORE VALUES</option>
                                    @foreach($competenceCoreValues as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('competence_core_value_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="competence_leadership_id">KOMPETENSI LEADERSHIP</label>
                                <select wire:model="state.competence_leadership_id" class="form-control @error('competence_leadership_id') is-invalid @enderror" id="competence_leadership_id" >
                                    <option value="" selected>KOMPETENSI LEADERSHIP</option>
                                    @foreach($competenceLeaderships as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('competence_leadership_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="competence_fanctional_id">KOMPETENSI FUNCTIONAL</label>
                                <select wire:model="state.competence_fanctional_id" class="form-control @error('competence_fanctional_id') is-invalid @enderror" id="competence_fanctional_id" >
                                    <option value="" selected>KOMPETENSI FUNCTIONAL</option>
                                    @foreach($competenceFanctionals as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('competence_fanctional_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="other_competencies_id">KOMPETENSI LAINNYA</label>
                                <select wire:model="state.other_competencies_id" class="form-control @error('other_competencies_id') is-invalid @enderror" id="other_competencies_id" >
                                    <option value="" selected>KOMPETENSI LAINNYA</option>
                                    @foreach($allOtherCompetencies as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('other_competencies_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="text" wire:model="state.rating" class="form-control @error('rating') is-invalid @enderror" id="rating" placeholder="Enter Rating">
                                @error('rating')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trnevent_topic">trnevent_topic</label>
                                <input type="text" wire:model="state.trnevent_topic" class="form-control @error('trnevent_topic') is-invalid @enderror" id="trnevent_topic" placeholder="Enter trnevent_topic">
                                @error('trnevent_topic')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trncourse_cost">trncourse_cost</label>
                                <input type="text" wire:model="state.trncourse_cost" class="form-control @error('trncourse_cost') is-invalid @enderror" id="trncourse_cost" placeholder="Enter trncourse_cost">
                                @error('trncourse_cost')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trnevent_type">trnevent_type</label>
                                <input type="text" wire:model="state.trnevent_type" class="form-control @error('trnevent_type') is-invalid @enderror" id="trnevent_type" placeholder="Enter trnevent_type">
                                @error('trnevent_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trn_flag">trn_flag</label>
                                <input type="text" wire:model="state.trn_flag" class="form-control @error('trn_flag') is-invalid @enderror" id="trn_flag" placeholder="Enter trn_flag">
                                @error('trn_flag')
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
                        <a href="{{ route('training-histories.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
