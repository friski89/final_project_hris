    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
            <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Data Keluarga
                </button>
            </h5>
            </div>
            <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
            <div class="card-body post-about">
                <div class="row">

                    @forelse ($user->families as $item)
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h6>Nama Keluarga</h6>
                                            <h6>Status Keluarga</h6>
                                            <h6>NIK</h6>
                                            <h6>Jenis Kelamin</h6>
                                            <h6>Tanggal Lahir</h6>
                                            <h6>No Telepon</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <h6>: {{ $item->family_name}}</h6>
                                            <h6>: {{ $item->relationship }}</h6>
                                            <h6>: {{ $item->nik_id }}</h6>
                                            <h6>: {{ $item->gender }}</h6>
                                            <h6>: {{ date('d F Y',strtotime($item->date_of_birth)) }}</h6>
                                            <h6>: {{ $item->handphone_number }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>Tidak ada Data</h5>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>

            </div>
        </div>
    </div>
