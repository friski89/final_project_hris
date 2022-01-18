    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
            <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Keahlian & Profesi
                </button>
            </h5>
            </div>
            <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
            <div class="card-body post-about">
                <div class="row">
                    @forelse ($user->skillsAndProfessions as $item)
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h6>Certificate</h6>
                                            <h6>Instansi</h6>
                                            <h6>Tanggal Mulai</h6>
                                            <h6>Tanggal Akhir</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <h6>: {{ $item->certificate_name}}</h6>
                                            <h6>: {{ $item->institution }}</h6>
                                            <h6>: {{ date('d F Y',strtotime($item->start_date)) }}</h6>
                                            <h6>: {{ date('d F Y',strtotime($item->end_date)) }}</h6>
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
