<div>
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
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="default-according style-1 faq-accordion job-accordion">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card profile-header">
                                            <div class="userpro-box">
                                                <div class="img-wrraper">
                                                <div class="avatar"><img class="img-fluid" alt="" src="{{ $user->avatar_url }}"></div>
                                                    <a class="icon-wrapper" href="{{ route('Myprofile') }}">
                                                        <i class="icofont icofont-pencil-alt-5"></i>
                                                </a>
                                                </div>
                                                <div class="user-designation">
                                                    <div class="title"><a target="_blank" href="">
                                                        <h4>{{ $user->name }}</h4>
                                                        <h6>{{ $user->jabatan }}</h6></a>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($linkID === 'my profile')
                            <x-profile.my-profile :user="$user"/>
                        @elseif ($linkID === 'riwayat kedinasan')
                            <x-profile.riwayat-kedinasan :user="$user"/>
                        @elseif ($linkID === 'riwayat penugasan khusus')
                            <x-profile.riwayat-penugasan :user="$user"/>
                        @elseif ($linkID === 'riwayat penilaian kinerja')
                            <x-profile.penilaian-kinerja :user="$user"/>
                        @elseif ($linkID === 'riwayat prestasi')
                            <x-profile.riwayat-prestasi :user="$user"/>
                        @elseif ($linkID === 'riwayat pendidikan')
                            <x-profile.riwayat-pendidikan :user="$user"/>
                        @elseif ($linkID === 'riwayat training')
                            <x-profile.riwayat-training :user="$user"/>
                        {{-- @elseif ($linkID === 'keahlian & profesi')
                            <x-profile.keahlian-profesi :user="$user"/> --}}
                        @elseif ($linkID === 'data keluarga')
                            <x-profile.data-keluarga :user="$user"/>
                        @elseif ($linkID === 'cuti')
                            <x-profile.cuti :user="$user"/>
                        @elseif ($linkID === 'izin')
                            <x-profile.izin :user="$user"/>
                        @elseif ($linkID === 'pakta integritas')
                            <x-profile.pakta-integritas :user="$user"/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="customizer-links">
    <div class="nav flex-column nac-pills" id="c-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click.prevent="profileLink('my profile')">
            <div class="settings"><i class="icofont icofont-ui-home"></i></div>
            <span>My Profile</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click.prevent="profileLink('riwayat kedinasan')">
            <div class="settings"><i class="icofont icofont-briefcase-alt-2"></i></div>
            <span>Riwayat Kedinasan</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('riwayat penugasan khusus')">
            <div class="settings"><i class="icofont icofont-building-alt"></i></div>
            <span>Riwayat Penugasan Khusus</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('riwayat penilaian kinerja')">
            <div class="settings"><i class="icofont icofont-chart-histogram"></i></div>
            <span>Riwayat Penilaian Kinerja</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('riwayat prestasi')">
            <div class="settings"><i class="icofont icofont-award"></i></div>
            <span>Riwayat Prestasi</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('riwayat pendidikan')">
            <div class="settings"><i class="icofont icofont-university"></i></div>
            <span>Riwayat Pendidikan</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('riwayat training')">
            <div class="settings"><i class="icofont icofont-certificate-alt-1"></i></div>
            <span>Riwayat Training</span>
        </a>
        {{-- <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('keahlian & profesi')">
            <div class="settings"><i class="icofont icofont-instrument"></i></div>
            <span>Keahlian & Profesi</span>
        </a> --}}
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('data keluarga')">
            <div class="settings"><i class="icofont icofont-people"></i></div>
            <span>Data Keluarga</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('cuti')">
            <div class="settings"><i class="icofont icofont-bag-alt"></i></div>
            <span>Cuti</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('izin')">
            <div class="settings"><i class="icofont icofont-clock-time"></i></div>
            <span>Izin</span>
        </a>
        <a class="nav-link" id="c-pills-home-tab" data-bs-toggle="pill" wire:click="profileLink('pakta integritas')">
            <div class="settings"><i class="icofont icofont-attachment"></i></div>
            <span>Pakta Integritas</span>
        </a>
    </div>
</div>
{{-- <div class="modal fade bd-example-modal-lg" id="add-data-keluarga" tabindex="-1" role="dialog" aria-labelledby="add-data-keluarga-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-data-keluarga-title">Modal title</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form>
            <div class="modal-body">
                <p><i>if you don't know whats you must input, please fill with "-"</i></p>
                <div class="row">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Employee Name:</label>
                        <input class="form-control" type="text" value="{{Auth()->user->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="message-text">Message:</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="button">Save changes</button>
            </div>

            </form>
        </div>
    </div>
</div> --}}
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
@endpush
</div>
