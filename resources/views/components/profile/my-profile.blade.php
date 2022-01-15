
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
            <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">My Profile</button>
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
    {{-- <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
    <div class="card">
        <div class="card-header">
        <h5 class="p-0">
            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon8" aria-expanded="true" aria-controls="collapseicon8">Followers</button>
        </h5>
        </div>
        <div class="collapse show" id="collapseicon8" aria-labelledby="collapseicon8" data-parent="#accordion">
        <div class="card-body social-list filter-cards-view">
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/2.png">
            <div class="media-body"><span class="d-block">Bucky Barnes</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/3.png">
            <div class="media-body"><span class="d-block">Sarah Loren</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/3.jpg">
            <div class="media-body"><span class="d-block">Jason Borne</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/10.jpg">
            <div class="media-body"><span class="d-block">Comeren Diaz</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/11.png">
            <div class="media-body"><span class="d-block">Andew Jon</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
    <div class="card">
        <div class="card-header">
        <h5 class="p-0">
            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon11" aria-expanded="true" aria-controls="collapseicon11">Followings</button>
        </h5>
        </div>
        <div class="collapse show" id="collapseicon11" aria-labelledby="collapseicon11" data-parent="#accordion">
        <div class="card-body social-list filter-cards-view">
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/3.png">
            <div class="media-body"><span class="d-block">Sarah Loren</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/2.png">
            <div class="media-body"><span class="d-block">Bucky Barnes</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/10.jpg">
            <div class="media-body"><span class="d-block">Comeren Diaz</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/3.jpg">
            <div class="media-body"><span class="d-block">Jason Borne</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="../assets/images/user/11.png">
            <div class="media-body"><span class="d-block">Andew Jon</span><a href="javascript:void(0)">Add Friend</a></div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
    <div class="card">
        <div class="card-header">
        <h5 class="p-0">
            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon4" aria-expanded="true" aria-controls="collapseicon4">Latest Photos</button>
        </h5>
        </div>
        <div class="collapse show" id="collapseicon4" data-parent="#accordion" aria-labelledby="collapseicon4">
        <div class="card-body photos filter-cards-view">
            <ul>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-1.png"></div>
            </li>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-2.png"></div>
            </li>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-3.png"></div>
            </li>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-4.png"></div>
            </li>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-5.png"></div>
            </li>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-6.png"></div>
            </li>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-7.png"></div>
            </li>
            <li>
                <div class="latest-post"><img class="img-fluid" alt="" src="../assets/images/social-app/post-8.png"></div>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
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
    </div> --}}

