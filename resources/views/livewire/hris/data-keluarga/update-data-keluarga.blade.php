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
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <a href="{{ route('users.index') }}" class="mr-4"
                            ><i class="icon ion-md-arrow-back"></i
                        ></a>
                        @lang('crud.families.create_title')
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
                                        <input type="hidden" wire:model="state.id" class="form-control">
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
                                    <label for="marital_status">Marital Status</label>
                                    <select wire:model="state.marital_status" class="form-control @error('marital_status') is-invalid @enderror" id="marital_status" >
                                        <option value="">-- Select Marital Status --</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah" >Belum menikah</option>
                                        <option value="Duda">Duda</option>
                                        <option value="Janda">Janda</option>
                                    </select>
                                    @error('marital_status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_marital">Date Marital</label>
                                    <input type="date" wire:model="state.date_marital" class="form-control @error('date_marital') is-invalid @enderror" id="date_marital" placeholder="Enter Date Marital">
                                    @error('date_marital')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_kk">No KK</label>
                                    <input type="text" wire:model="state.no_kk" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" placeholder="Enter No KK">
                                    @error('no_kk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="family_name">Family Name</label>
                                    <input type="text" wire:model="state.family_name" class="form-control @error('family_name') is-invalid @enderror" id="family_name" placeholder="Enter Family Name">
                                    @error('family_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nik_id">NIK</label>
                                    <input type="text" wire:model="state.nik_id" class="form-control @error('nik_id') is-invalid @enderror" id="nik_id" placeholder="Enter NIK">
                                    @error('nik_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="place_of_birth">Place Of Birth</label>
                                    <input type="text" wire:model="state.place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" placeholder="Enter Place Of Birth">
                                    @error('place_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_of_birth">Date Of Birth</label>
                                    <input type="date" wire:model="state.date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" placeholder="Enter Date Of Birth">
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select wire:model="state.gender" class="form-control @error('gender') is-invalid @enderror" id="gender" >
                                        <option value="">-- Select Gender --</option>
                                        <option value="male">Male</option>
                                        <option value="female" >Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    @error('gender')
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
                                    @error('religion')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="religion">Religion</label>
                                    <select wire:model="state.religion" class="form-control @error('religion') is-invalid @enderror" id="religion" >
                                        <option value="">-- Select Religion --</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Konghucu">Katholik</option>
                                        <option value="Konghucu">Protestan</option>
                                    </select>
                                    @error('religion')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="citizenship">Citizenship</label>
                                    <input type="text" wire:model="state.citizenship" class="form-control @error('citizenship') is-invalid @enderror" id="citizenship" placeholder="Enter Citizenship">
                                    @error('citizenship')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="work">Work</label>
                                    <input type="text" wire:model="state.work" class="form-control @error('work') is-invalid @enderror" id="work" placeholder="Enter Work">
                                    @error('work')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="health_status"></label>
                                    <div class="mt-1">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox"  wire::model="state.health_status" wire:click="$toggle('state.health_status')" {{ $state['health_status'] === true ? "checked" : "" }}  id="health_status" class="form-checkbox h-6 w-6 text-green-500">
                                            <span><label for="health_status">Health Status</label></span>
                                        </label>
                                    </div>
                                    @error('health_status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <select wire:model="state.blood_group" class="form-control @error('blood_group') is-invalid @enderror" id="blood_group" >
                                        <option value="">-- Select Blood Group --</option>
                                        <option value="Tidak Tahu" >Tidak tahu</option>
                                        <option value="O">O</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">Ab</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="blood_rhesus">Blood Rhesus</label>
                                    <input type="text" wire:model="state.blood_rhesus" class="form-control @error('blood_rhesus') is-invalid @enderror" id="blood_rhesus" placeholder="Enter Blood Rhesus">
                                    @error('blood_rhesus')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="house_number">House Number</label>
                                    <input type="text" wire:model="state.house_number" class="form-control @error('house_number') is-invalid @enderror" id="house_number" placeholder="Enter House Number">
                                    @error('house_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="handphone_number">Handphone Number</label>
                                    <input type="text" wire:model="state.handphone_number" class="form-control @error('handphone_number') is-invalid @enderror" id="handphone_number" placeholder="Enter Handphone Number">
                                    @error('handphone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="emergency_number">Emergency Number</label>
                                    <input type="text" wire:model="state.emergency_number" class="form-control @error('emergency_number') is-invalid @enderror" id="emergency_number" placeholder="Enter Emergency Number">
                                    @error('emergency_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea wire:model="state.address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Address"></textarea>
                                    @error('address')
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
                                    <label for="province">Province</label>
                                    <input type="text" wire:model="state.province" class="form-control @error('province') is-invalid @enderror" id="province" placeholder="Enter Province">
                                    @error('province')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" wire:model="state.postal_code" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" placeholder="Enter Postal Code">
                                    @error('postal_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="relationship">Relationship</label>
                                    <select wire:model="state.relationship" class="form-control @error('relationship') is-invalid @enderror" id="relationship" >
                                        <option value="">-- Select Relationship --</option>
                                        <option value="Suami" >Suami</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Anak">Anak</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="alive"></label>
                                    <div class="mt-1">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" wire.model="state.alive" wire:click="$toggle('state.alive')"  {{ $state['alive'] === true ? "checked" : "" }}  id="alive" class="form-checkbox h-6 w-6 text-green-500">
                                            <span><label for="alive">Alive</label></span>
                                        </label>
                                    </div>
                                    @error('alive')
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
