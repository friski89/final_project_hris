<div>
    @section('title')@lang('crud.users.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.users.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.users.name')</li>
        <li class="breadcrumb-item active">@lang('crud.users.create_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('users.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.users.create_title')
                </h4>
            </div>
            <form autocomplete="off" wire:submit.prevent="createForm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"
                                x-data="imageViewer('')"
                            >
                                <label for="avatar">
                                    Avatar
                                </label>
                                <!-- Show the image -->
                                <template x-if="imageUrl">
                                    <img
                                        :src="imageUrl"
                                        class="object-cover rounded border border-gray-200"
                                        style="width: 100px; height: 100px;"
                                    />
                                </template>

                                <!-- Show the gray box when image is not available -->
                                <template x-if="!imageUrl">
                                    <div
                                        class="border rounded border-gray-200 bg-gray-100"
                                        style="width: 100px; height: 100px;"
                                    ></div>
                                </template>

                                <div class="mt-2">
                                    <input
                                        type="file"
                                        wire:model="state.avatar"
                                        name="avatar"
                                        id="avatar"
                                        @change="fileChosen"
                                    />
                                </div>

                                @error('avatar') @include('components.inputs.partials.error')
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nama Karyawan</label>
                                <input type="text" wire:model="state.name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Karyawan">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" wire:model="state.email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Nama Karyawan">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik_telkom">Nik Telkom</label>
                                <input type="text" wire:model="state.nik_telkom" class="form-control @error('nik_telkom') is-invalid @enderror" id="nik_telkom" placeholder="Nik Telkom">
                                @error('nik_telkom')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik_company">Nik Company</label>
                                <input type="text" wire:model="state.nik_company" class="form-control @error('nik_company') is-invalid @enderror" id="nik_company" placeholder="Nik Company">
                                @error('nik_company')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_in">Tanggal Bergabung</label>
                                <input type="date" wire:model="state.date_in" class="form-control @error('date_in') is-invalid @enderror" id="date_in" placeholder="Tanggal Bergabung">
                                @error('date_in')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="band_position_id">Band Position</label>
                                <select wire:model="state.band_position_id" class="form-control @error('band_position_id') is-invalid @enderror" id="band_position_id" >
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
                                <label for="job_grade_id">Job Grade</label>
                                <select wire:model="state.job_grade_id" class="form-control @error('job_grade_id') is-invalid @enderror" id="job_grade_id" >
                                    <option value="" selected>Job Grade</option>
                                    @foreach($jobGrades as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('job_grade_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="job_family_id">Job Family</label>
                                <select wire:model="state.job_family_id" class="form-control @error('job_family_id') is-invalid @enderror" id="job_family_id" >
                                    <option value="" selected>Job Family</option>
                                    @foreach($jobFamilies as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('job_family_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="job_function_id">Job Function</label>
                                <select wire:model="state.job_function_id" class="form-control @error('job_function_id') is-invalid @enderror" id="job_function_id" >
                                    <option value="" selected>Job Function</option>
                                    @foreach($jobFunctions as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('job_function_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="job_title_id">Job Title</label>
                                <select wire:model="state.job_title_id" class="form-control @error('job_title_id') is-invalid @enderror" id="job_title_id" >
                                    <option value="" selected>Job Title</option>
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
                                <label for="city_recuite_id">Kota Rekrutasi</label>
                                <select wire:model="state.city_recuite_id" class="form-control @error('city_recuite_id') is-invalid @enderror" id="city_recuite_id" >
                                    <option value="" selected>Kota Rekrutasi</option>
                                    @foreach($cityRecuites as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('city_recuite_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_employee_id">Status Karyawan</label>
                                <select wire:model="state.status_employee_id" class="form-control @error('status_employee_id') is-invalid @enderror" id="status_employee_id" >
                                    <option value="" selected>Status Karyawan</option>
                                    @foreach($statusEmployee as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('status_employee_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sub_status_id">Sub Status</label>
                                <select wire:model="state.sub_status_id" class="form-control @error('sub_status_id') is-invalid @enderror" id="sub_status_id" >
                                    <option value="" selected>Sub Status</option>
                                    @foreach($subStatus as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('sub_status_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="company_host_id">Company Host</label>
                                <select wire:model="state.company_host_id" class="form-control @error('company_host_id') is-invalid @enderror" id="company_host_id" >
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
                                <select wire:model="state.company_home_id" class="form-control @error('company_home_id') is-invalid @enderror" id="company_home_id" >
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
                                <label for="date_sk">Tanggal SK</label>
                                <input type="date" wire:model="state.date_sk" class="form-control @error('date_sk') is-invalid @enderror" id="date_sk" placeholder="Tanggal SK">
                                @error('date_sk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="direktorat_id">Direktorat</label>
                                <select wire:model="state.direktorat_id" class="form-control @error('direktorat_id') is-invalid @enderror" id="direktorat_id" >
                                    <option value="" selected>Direktorat</option>
                                    @foreach($direktorats as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('direktorat_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="division_id">Division</label>
                                <select wire:model="state.division_id" class="form-control @error('division_id') is-invalid @enderror" id="division_id" >
                                    <option value="" selected>Division</option>
                                    @foreach($divisions as $value)
                                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departement_id">Departement</label>
                                <select wire:model="state.departement_id" class="form-control @error('departement_id') is-invalid @enderror" id="departement_id" >
                                    <option value="" selected>Departement</option>
                                    @foreach($departements as $value)
                                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_id">Unit</label>
                                <select wire:model="state.unit_id" class="form-control @error('unit_id') is-invalid @enderror" id="unit_id" >
                                    <option value="" selected>Unit</option>
                                    @foreach($units as $value)
                                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="place_of_birth">Tempat Lahir</label>
                                <input type="text" wire:model="state.place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" placeholder="Tempat Lahir">
                                @error('place_of_birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_of_birth">Tanggal Lahir</label>
                                <input type="date" wire:model="state.date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" placeholder="Tanggal Lahir">
                                @error('date_of_birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="age">Usia</label>
                                <input type="text" wire:model="state.age" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="Usia">
                                @error('age')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="work_location_id">Lokasi Kerja</label>
                                <select wire:model="state.work_location_id" class="form-control @error('work_location_id') is-invalid @enderror" id="work_location_id" >
                                    <option value="" selected>Lokasi Kerja</option>
                                    @foreach($workLocations as $value => $label)
                                    <option value="{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('work_location_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edu_id">Pendidikan Terakhir</label>
                                <select wire:model="state.edu_id" class="form-control @error('edu_id') is-invalid @enderror" id="edu_id" >
                                    <option value="" selected>Pendidikan Terakhir</option>
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
                                <label for="jabatan">Jabatan</label>
                                <input type="text" wire:model="state.jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_kartap">Tanggal Kartap</label>
                                <input type="date" wire:model="state.tanggal_kartap" class="form-control @error('tanggal_kartap') is-invalid @enderror" id="tanggal_kartap" placeholder="Tanggal Kartap">
                                @error('tanggal_kartap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_sk_kartap">No SK Kartap</label>
                                <input type="text" wire:model="state.no_sk_kartap" class="form-control @error('no_sk_kartap') is-invalid @enderror" id="no_sk_kartap" placeholder="No SK Kartap">
                                @error('no_sk_kartap')
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
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
