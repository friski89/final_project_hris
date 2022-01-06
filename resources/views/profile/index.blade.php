<x-admin-layout>
    @push('css')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jsgrid.css')}}">
    @endpush
    @section('title')@lang('crud.company_homes.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.profiles.name')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.profiles.name')</li>
        <li class="breadcrumb-item active">@lang('crud.profiles.show_title')</li>
    @endcomponent
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                    <h4 class="card-title mb-0">My Profile</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                        <div class="profile-title">
                            <div class="media"> <img class="img-70 rounded-circle" alt="" src="{{ auth()->user()->avatar_url }}">
                            <div class="media-body">
                                <h3 class="mb-1 f-20 txt-primary">{{ auth()->user()->name }}</h3>
                                <p class="f-12">{{  Auth::user()->unit->name ?? '-'}}</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <form action="{{ route('Myprofile.change_password') }}" class="form-horizontal" method="POST">
                            @csrf

                            <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input class="form-control" type="password" name="current_password">
                            @error('current_password')
                                @push('notif')
                                    <script>
                                        const notyf = new Notyf({dismissible: true})
                                        notyf.error('{{ $message }}')
                                    </script>
                                @endpush
                            @enderror
                            </div>
                            <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input class="form-control" type="password" name="new_password" >
                            @error('new_password')
                                @push('notif')
                                    <script>
                                        const notyf = new Notyf({dismissible: true})
                                        notyf.error('{{ $message }}')
                                    </script>
                                @endpush
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input class="form-control" type="password" name="new_confirm_password" >
                                @error('new_confirm_password')
                                    @push('notif')
                                        <script>
                                            const notyf = new Notyf({dismissible: true})
                                            notyf.error('{{ $message }}')
                                        </script>
                                    @endpush
                                @enderror
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
                </div>
                <div class="col-xl-8">
                    <form class="card" enctype="multipart/form-data" action="{{ route('Myprofile.update') }}" method="POST">
                        @csrf
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                    <i class="fe fe-chevron-up"></i></a>
                                    <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                        <i class="fe fe-x"></i>
                                    </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No. KTP</label>
                                        <input class="form-control" type="text" name="no_ktp" placeholder="No. KTP" value={{ optional(Auth::user()->profile)->no_ktp }}>

                                        @error('no_ktp')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input class="form-control" name="email" type="email" value="{{ Auth::user()->email }}" placeholder="Email">

                                        @error('email')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No. NPWP</label>
                                        <input class="form-control" name="no_npwp" value="{{ optional(Auth::user()->profile)->no_npwp }}" type="text" placeholder="No. NPWP">

                                        @error('no_npwp')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input class="form-control" type="text" name="phone_number" value="{{ optional(Auth::user()->profile)->phone_numbers }}" placeholder="Phone Number Ex : 0812XXX">

                                        @error('phone_number')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-control btn-square">
                                            @php $selected = old('gender', (optional(Auth::user()->profile)->gender ?? '' )) @endphp
                                            <option disabled {{ empty($selected) ? 'selected' : '' }}>Gender</option>
                                            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
                                            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
                                            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
                                        </select>
                                        @error('gender')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <select name="blood_group" class="form-control btn-square">
                                            @php $selected = old('blood_group', (optional(Auth::user()->profile)->blood_group ?? '' )) @endphp
                                            <option disabled {{ empty($selected) ? 'selected' : '' }}>Golongan Darah</option>
                                            <option value="Tidak Tahu" {{ $selected == 'tidak tahu' ? 'selected' : '' }} >tidak tahu</option>
                                            <option value="O" {{ $selected == 'O' ? 'selected' : '' }} >o</option>
                                            <option value="A" {{ $selected == 'A' ? 'selected' : '' }} >a</option>
                                            <option value="B" {{ $selected == 'B' ? 'selected' : '' }} >b</option>
                                            <option value="AB" {{ $selected == 'AB' ? 'selected' : '' }} >ab</option>
                                        </select>
                                        @error('blood_group')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address KTP</label>
                                        <input class="form-control" name="address_ktp" value="{{ old('address_ktp', (optional(Auth::user()->profile)->address_ktp ?? '' ))
                                    }}" type="text" placeholder="Address KTP">
                                    </div>
                                    @error('address_ktp')
                                        @push('notif')
                                            <script>
                                                const notyf = new Notyf({dismissible: true})
                                                notyf.error('{{ $message }}')
                                            </script>
                                        @endpush
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address Domisili</label>
                                        <input class="form-control" name="address_domisili" value="{{ old('address_domisili', (optional(Auth::user()->profile)->address_domisili ?? '' ))
                                    }}" type="text" placeholder="Address Domisili">
                                    </div>
                                    @error('address_domisili')
                                        @push('notif')
                                            <script>
                                                const notyf = new Notyf({dismissible: true})
                                                notyf.error('{{ $message }}')
                                            </script>
                                        @endpush
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address NPWP</label>
                                        <input class="form-control" name="address_npwp" value="{{ old('address_npwp', (optional(Auth::user()->profile)->address_npwp ?? '' ))
                                    }}" type="text" placeholder="Address NPWP">
                                    </div>
                                    @error('address_npwp')
                                        @push('notif')
                                            <script>
                                                const notyf = new Notyf({dismissible: true})
                                                notyf.error('{{ $message }}')
                                            </script>
                                        @endpush
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Domisili Status</label>
                                        <select name="status_domisili" class="form-control btn-square">
                                            @php $selected = old('status_domisili', (optional(Auth::user()->profile)->status_domisili ?? '' )) @endphp
                                            <option disabled {{ empty($selected) ? 'selected' : '' }}>Domisili Status</option>
                                            <option value="Rumah Sendiri" {{ $selected == 'Rumah Sendiri' ? 'selected' : '' }} >Rumah sendiri</option>
                                            <option value="Rumah Sewa" {{ $selected == 'Rumah Sewa' ? 'selected' : '' }} >Rumah sewa</option>
                                            <option value="Rumah Keluarga" {{ $selected == 'Rumah Keluarga' ? 'selected' : '' }} >Rumah keluarga</option>
                                        </select>
                                        @error('status_domisili')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Religion</label>
                                        <select name="religion_id" class="form-control btn-square">
                                            @php $selected = old('religion_id', (optional(Auth::user()->profile)->religion_id ?? '' )) @endphp
                                            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Religion</option>
                                            @foreach($religions as $value => $label)
                                            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @error('religion_id')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Name</label>
                                        <input class="form-control" name="nama_ibu" value="{{ old('nama_ibu', (optional(Auth::user()->profile)->nama_ibu ?? '' ))
                                    }}" type="text" placeholder="Mother Name">
                                    @error('nama_ibu')
                                        @push('notif')
                                            <script>
                                                const notyf = new Notyf({dismissible: true})
                                                notyf.error('{{ $message }}')
                                            </script>
                                        @endpush
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input class="form-control" name="avatar" value="" type="file" @change="fileChosen">
                                        @error('avatar') @include('components.inputs.partials.error')
                                            @push('notif')
                                                <script>
                                                    const notyf = new Notyf({dismissible: true})
                                                    notyf.error('{{ $message }}')
                                                </script>
                                            @endpush
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm col-md-3">
                                    <div class="mb-3">
                                        <div class="checkbox">
                                            <input id="vaccine1" value="1" {{ optional(Auth::user()->profile)->vaccine1 == 1 ? 'checked' : ''  }} name="vaccine1"  type="checkbox">
                                            <label for="vaccine1">Vaksin 1</label>
                                            @error('vaccine1')
                                                @push('notif')
                                                    <script>
                                                        const notyf = new Notyf({dismissible: true})
                                                        notyf.error('{{ $message }}')
                                                    </script>
                                                @endpush
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm col-md-3">
                                    <div class="mb-3">
                                        <div class="checkbox">
                                            <input id="vaccine2" name="vaccine2" value="1" {{ optional(Auth::user()->profile)->vaccine2 == "1" ? 'checked' : '' }} type="checkbox">
                                            <label for="vaccine2">Vaksin 2</label>
                                            @error('vaccine2')
                                                @push('notif')
                                                    <script>
                                                        const notyf = new Notyf({dismissible: true})
                                                        notyf.error('{{ $message }}')
                                                    </script>
                                                @endpush
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm col-md-3">
                                    <div class="mb-3">
                                        <div class="checkbox">
                                            <input id="not_vaccine" value="1" name="not_vaccine" {{ optional(Auth::user()->profile)->not_vaccine == "1" ? 'checked' : '' }} type="checkbox">
                                            <label for="not_vaccine">Tidak Vaksin</label>
                                            @error('not_vaccine')
                                                @push('notif')
                                                    <script>
                                                        const notyf = new Notyf({dismissible: true})
                                                        notyf.error('{{ $message }}')
                                                    </script>
                                                @endpush
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Alasan Tidak Vaksin</label>
                                        <textarea class="form-control" name="remarks_not_vaccine" rows="3" placeholder="Alasan Tidak Vaksin">{{ old('remarks_not_vaccine', (optional(Auth::user()->profile)->remarks_not_vaccine ?? '' ))
                                    }}</textarea>
                                    @error('remarks_not_vaccine')
                                        @push('notif')
                                            <script>
                                                const notyf = new Notyf({dismissible: true})
                                                notyf.error('{{ $message }}')
                                            </script>
                                        @endpush
                                    @enderror
                                    </div>
                                </div>
                                <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">

                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">@lang('crud.educational_backgrounds.name')</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div id="educationalBackgrounds"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">@lang('crud.families.index_title')</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div id="familyList"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @push('scripts')
	    <script src="{{asset('assets/js/jsgrid/jsgrid.min.js')}}"></script>
        <script src="{{asset('assets/js/jsgrid/griddata.js')}}"></script>
        <script src="{{asset('assets/js/jsgrid/jsgrid.js')}}"></script>
	@endpush --}}
</x-admin-layout>
