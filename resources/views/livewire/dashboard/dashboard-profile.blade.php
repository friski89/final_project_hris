@section('title')Dashboard
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>Dashboard Profile</h3>
    @endslot
    <li class="breadcrumb-item active">Dashboard Profile</li>
@endcomponent

<div class="container-fluid">
    <div class="user-profile">
        <div class="row">
            <!-- user profile header start-->
            <div class="col-sm-12">
                <div class="card profile-header"><img class="img-fluid bg-img-cover" src="{{ asset('assets/images/banner/bg-admedika.jpg') }}" alt="">
                <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{ asset('assets/images/user-profile/bg-profile.jpg') }}" alt=""></div>
                <div class="userpro-box">
                    <div class="img-wrraper">
                    <div class="avatar"><img class="img-fluid" alt="" src="{{ auth()->user()->avatar_url }}"></div><a class="icon-wrapper" href="{{ route('Myprofile') }}"><i class="icofont icofont-pencil-alt-5"></i></a>
                    </div>
                    <div class="user-designation">
                    <div class="title"><a target="_blank" href="">
                        <h4>{{ auth()->user()->name }}</h4>
                        <h6>{{ auth()->user()->unit->name }}</h6></a></div>
                    {{-- <div class="social-media">
                        <ul class="user-list-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div> --}}
                    {{-- <div class="follow">
                        <ul class="follow-list">
                        <li>
                            <div class="follow-num counter">325</div><span>Follower</span>
                        </li>
                        <li>
                            <div class="follow-num counter">450</div><span>Following</span>
                        </li>
                        <li>
                            <div class="follow-num counter">500</div><span>Likes</span>
                        </li>
                        </ul>
                    </div> --}}
                    </div>
                </div>
                </div>
            </div>
            <!-- user profile header end-->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="default-according style-1 faq-accordion job-accordion">
                    <div class="row">
                        <div class="col-xl-12">
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
                                                        <p>Fullname</p>
                                                        <h5>{{ auth()->user()->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>NIK Telkom</p>
                                                        <h5>{{ auth()->user()->nik_telkom ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>NIK Company</p>
                                                        <h5>{{ auth()->user()->nik_company ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Email</p>
                                                        <h5>{{ auth()->user()->email ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Date In</p>
                                                        <h5>{{ auth()->user()->date_in ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Status Employee</p>
                                                        <h5>{{ auth()->user()->statusEmployee->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul>
                                                <li>
                                                    <div>
                                                        <p>Job Title</p>
                                                        <h5>{{ auth()->user()->jobTitle->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Directorate</p>
                                                        <h5>{{ auth()->user()->direktorat->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Division</p>
                                                        <h5>{{ auth()->user()->division->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Department</p>
                                                        <h5>{{ auth()->user()->departement->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Unit</p>
                                                        <h5>{{ auth()->user()->unit->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Company Host</p>
                                                        <h5>{{ auth()->user()->companyHost->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul>
                                                <li>
                                                    <div>
                                                        <p>Band Position</p>
                                                        <h5>{{ auth()->user()->bandPosition->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Job Function</p>
                                                        <h5>{{ auth()->user()->jobFunction->name ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Job Family</p>
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
                                                        <p>Date Of Birth</p>
                                                        <h5>{{ auth()->user()->date_of_birth ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <p>Phone Number</p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            $nav = $('.main-nav');
            $header = $('.page-main-header');
            $toggle_nav_top = $('#sidebar-toggle');
            // $toggle_nav_top.click(function() {
            $this = $(this);
            $nav = $('.main-nav');
            $nav.toggleClass('close_icon');
            $header.toggleClass('close_icon');
            // });
        })
    </script>
    <script src="{{ asset('js/nav.js') }}"></script>
@endpush
