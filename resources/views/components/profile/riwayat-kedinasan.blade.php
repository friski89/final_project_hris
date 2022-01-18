    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
            <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Riwayat Kedinasan
                </button>
            </h5>
            </div>
            <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
            <div class="card-body post-about">
                <div class="row">
                    @forelse ($user->serviceHistories as $item)
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h6>Jabatan</h6>
                                            <h6>Periode</h6>
                                            <h6>Tanggal SK</h6>
                                            <h6>Perusahaan</h6>
                                            <h6>Divisi</h6>
                                            <h6>Uraian Pekerjaan</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <h6>: {{ $item->jobTitle->name }}</h6>
                                            <h6>: {{ date('d F Y',strtotime($item->end_date)) }}</h6>
                                            <h6>: {{ date('d F Y',strtotime($item->start_date)) }}</h6>
                                            <h6>: {{ $item->companyHome->name }}</h6>
                                            <h6>: {{ $user->division->name }}</h6>
                                            <h6>: {{ $item->type }}</h6>
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
