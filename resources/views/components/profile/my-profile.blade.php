
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
                                    <h5>{{ auth()->user()->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>NIK TELKOM</p>
                                    <h5>{{ auth()->user()->nik_telkom ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>NIK PERUSAHAAN</p>
                                    <h5>{{ auth()->user()->nik_company ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>EMAIL</p>
                                    <h5>{{ auth()->user()->email ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>TANGGAL MASUK</p>
                                    <h5>{{ auth()->user()->date_in ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>STATUS KARYAWAN</p>
                                    <h5>{{ auth()->user()->statusEmployee->name ?? '-' }}</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <ul>
                            <li>
                                <div>
                                    <p>JABATAN</p>
                                    <h5>{{ auth()->user()->jobTitle->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>DIREKTORAT</p>
                                    <h5>{{ auth()->user()->direktorat->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>DIVISI</p>
                                    <h5>{{ auth()->user()->division->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>DEPARTEMEN</p>
                                    <h5>{{ auth()->user()->departement->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>UNIT</p>
                                    <h5>{{ auth()->user()->unit->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>PERUSAHAAN</p>
                                    <h5>{{ auth()->user()->companyHost->name ?? '-' }}</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <ul>
                            <li>
                                <div>
                                    <p>BAND POSISI</p>
                                    <h5>{{ auth()->user()->bandPosition->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>FUNGSI PEKERJAAN</p>
                                    <h5>{{ auth()->user()->jobFunction->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>KATEGORI PEKERJAAN</p>
                                    <h5>{{ auth()->user()->jobFamily->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>Edu</p>
                                    <h5>{{ auth()->user()->edu->name ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>TANGGAL LAHIR</p>
                                    <h5>{{ auth()->user()->date_of_birth ?? '-' }}</h5>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>NO. HP</p>
                                    <h5>{{ auth()->user()->profile->phone_number ?? '-' }}</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
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

