<div class="col-xl-9">
    <div class="card">
        <div class="card-header">
            <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon25" aria-expanded="true" aria-controls="collapseicon2">Data Izin
                </button>
            </h5>
        </div>
    </div>
    <div class="row p-2">
        <div class="d-flex justify-content-between">
            <div></div>
            <div>
                <a href="{{route('hrm.create-izin.create', $user->username)}}" class="btn btn-primary">Pengajuan Izin</a>   
            </div>
        </div>
    </div>
    <div class="collapse show" id="collapseicon25" aria-labelledby="collapseicon25" data-parent="#accordion">
        <div class="card-body post-about">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Tidak ada Data</h5>
                        </div>
                    </div>
                </div>
                <!-- add for loop data cuti -->
            </div>
        </div>
    </div>
</div>