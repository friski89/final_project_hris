
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header bg-primary">
            <h5 class="p-0">
                <button class="btn btn-link ps-0 text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">My Profile</button>
            </h5>
            </div>
            <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
            <div class="card-body post-about">
                <div class="row">
                    <div class="col-lg-4">
                        <ul>
                            <li>
                                <div>
                                    <p>NAMA LENGKAP</p>
                                    <h5>{{ $user->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>NIK TELKOM</p>
                                    <h5>{{ $user->nik_telkom ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>NIK PERUSAHAAN</p>
                                    <h5>{{ $user->nik_company ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>EMAIL</p>
                                    <h5>{{ $user->email ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>TANGGAL MASUK</p>
                                    <h5>{{ $user->date_in ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>STATUS KARYAWAN</p>
                                    <h5>{{ $user->statusEmployee->name ?? '-' }}</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <ul>
                            <li>
                                <div>
                                    <p>JABATAN</p>
                                    <h5>{{ $user->jabatan ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>DIREKTORAT</p>
                                    <h5>{{ $user->direktorat->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>DIVISI</p>
                                    <h5>{{ $user->division->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>DEPARTEMEN</p>
                                    <h5>{{ $user->departement->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>UNIT</p>
                                    <h5>{{ $user->unit->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>PERUSAHAAN</p>
                                    <h5>{{ $user->companyHost->name ?? '-' }}</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <ul>
                            <li>
                                <div>
                                    <p>BAND POSISI</p>
                                    <h5>{{ $user->bandPosition->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>FUNGSI PEKERJAAN</p>
                                    <h5>{{ $user->jobFunction->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>KATEGORI PEKERJAAN</p>
                                    <h5>{{ $user->jobFamily->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>PENDIDIKAN</p>
                                    <h5>{{ $user->edu->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>TANGGAL LAHIR</p>
                                    <h5>{{ $user->date_of_birth ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>NO. HP</p>
                                    <h5>{{ $user->profile->phone_number ?? '-' }}</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="p-0">
                    <button class="btn btn-link ps-0 text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon13" aria-expanded="true" aria-controls="collapseicon13">My Information</button>
                </h5>
            </div>
            <div class="collapse show" id="collapseicon13" aria-labelledby="collapseicon13" data-parent="#accordion">
                <div class="card-body post-about">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li>
                                    <div>
                                        <p>NO KTP</p>
                                        <h5>{{ $user->profile->no_ktp ?? '-' }}</h5>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <p>ALAMAT DOMISILI</p>
                                        <h5>{{ $user->profile->address_domisili ?? '-' }}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>DOMISILI STATUS</p>
                                        <h5>{{ $user->profile->status_domisili ?? '-' }}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>NAMA ORANG TUA</p>
                                        <h5>{{ $user->profile->nama_ibu ?? '-' }}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>AGAMA</p>
                                        <h5>{{ $user->profile->religion->name ?? '-' }}</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li>
                                    <div>
                                        <p>NO NPWP</p>
                                        <h5>{{ $user->profile->no_npwp ?? '-' }}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>ALAMAT KTP</p>
                                        <h5>{{ $user->profile->address_ktp ?? '-' }}</h5>
                                    </div>
                                </li>
                                @if($user->profile != null)
                                <li>
                                    @if($user->profile != null )
                                    <div>
                                        <p>STATUS VAKSIN 1</p>
                                        <h5>{{ $user->profile->vaccine1 ? 'SUDAH' : 'BELUM' }}</h5>
                                    </div>
                                    @else
                                    <div>
                                        <p>STATUS VAKSIN 1</p>
                                        <h5></h5>
                                    </div>
                                    @endif
                                </li>
                                <li>
                                     @if($user->profile != null )
                                    <div>
                                        <p>STATUS VAKSIN 1</p>
                                        <h5>{{ $user->profile->vaccine2 ? 'SUDAH' : 'BELUM' }}</h5>
                                    </div>
                                    @else
                                    <div>
                                        <p>STATUS VAKSIN 1</p>
                                        <h5></h5>
                                    </div>
                                    @endif
                                </li>
                                @else
                                <li>
                                    <div>
                                        <p>STATUS VAKSIN 1</p>
                                        <h5>BELUM</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>STATUS VAKSIN 2</p>
                                        <h5>BELUM</h5>
                                    </div>
                                </li>
                                @endif
                                <li>
                                    <div>
                                        <p>ALASAN TIDAK VAKSIN</p>
                                        <h5>{{ $user->profile->remarks_not_vaccine ?? '-' }}</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($this->my_leader()) != 0)
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="p-0">
                    <button class="btn btn-link ps-0 text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon8" aria-expanded="true" aria-controls="collapseicon8">My Leader</button>
                </h5>
            </div>
            <div class="collapse show" id="collapseicon8" aria-labelledby="collapseicon8" data-parent="#accordion">
                <div class="card-body social-list filter-cards-view">
                    <div class="row">
                    @foreach($this->my_leader() as $my_leader)
                        @if($my_leader->atasan1 != null)
                        <div class="col-md-3">
                            <div class="media">
                                <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{ $my_leader->avatar != null ? url('storage/avatars/'.$my_leader->avatar) : asset('assets/images/dashboard/1.png') }}">
                                <div class="media-body">
                                    <span class="d-block">{{$my_leader->atasan1}}</span>
                                    {{-- <a href="javascript:void(0)">{{$my_leader->unit_name}}</a>
                                    <br/> --}}
                                    <a href="{{ route('leader.view',$my_leader->nik_atasan1) }}">{{$my_leader->jabatan}}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="p-0">
                    <button class="btn btn-link ps-0 text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon11" aria-expanded="true" aria-controls="collapseicon11">My Team Mates</button>
                </h5>
            </div>
            <div class="collapse show" id="collapseicon11" aria-labelledby="collapseicon11" data-parent="#accordion">
                <div class="card-body social-list filter-cards-view">
                    <div class="row">
                    @foreach($this->my_team_mates() as $my_team)
                        <div class="col-md-3">
                            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{ $my_team->avatar != null ? url('storage/avatars/'.$my_team->avatar) : asset('assets/images/dashboard/1.png') }}">
                                <div class="media-body">
                                    <span class="d-block">{{ $my_team->name }}</span>
                                    {{-- <a href="javascript:void(0)">{{ $my_team->unit_name }}</a>
                                    <br/> --}}
                                    <a href="{{ route('leader.view',$my_team->nik) }}">{{$my_team->jabatan}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($user->band_position_id < 5)
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="p-0">
                    <button class="btn btn-link ps-0 text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon12" aria-expanded="true" aria-controls="collapseicon12">My Team Subordinates</button>
                </h5>
            </div>
            <div class="collapse show" id="collapseicon12" aria-labelledby="collapseicon12" data-parent="#accordion">
                <div class="card-body social-list filter-cards-view">
                    <div class="row">
                    @foreach($this->my_subordinates() as $sub_ordinate)
                            <div class="col-md-3">
                                <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{ $sub_ordinate->avatar != null ? url('storage/avatars/'.$sub_ordinate->avatar) : asset('assets/images/dashboard/1.png') }}">
                                    <div class="media-body">
                                        <span class="d-block">{{ $sub_ordinate->name }}</span>
                                        {{-- <a href="javascript:void(0)">{{ $sub_ordinate->unit_name }}</a>
                                        <br/> --}}
                                        <a href="{{ route('leader.view',$sub_ordinate->nik) }}">{{$sub_ordinate->jabatan}}</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
    <div class="card">
        <div class="card-header">
        <h5 class="p-0">
            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon13" aria-expanded="true" aria-controls="collapseicon13">Friends</button>
        </h5>
        </div>
        <div class="collapse show" id="collapseicon13" data-parent="#accordion" aria-labelledby="collapseicon13">
        <div class="card-body avatar-showcase filter-cards-view">
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/3.jpg" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/5.jpg" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/1.jpg" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/2.png" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/3.png" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/6.jpg" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/10.jpg" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/14.png" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/1.jpg" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/4.jpg" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/11.png" alt="#"></div>
            <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="../assets/images/user/8.jpg" alt="#"></div>
        </div>
        </div>
    </div>
    </div>  -->

