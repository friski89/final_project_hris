    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
            <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Riwayat Pendidikan
                </button>
            </h5>
            </div>
            <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
            <div class="card-body post-about">
                <div class="row">
                    @forelse ($user->educationalBackgrounds as $item)
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h6>Jenjang - Jurusan</h6>
                                            <h6>Instansi</h6>
                                            <h6>Tahun Lulus</h6>
                                            <h6>Kota/Negara</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <h6>: {{ $item->edu->name . ' - ' . $item->major }}</h6>
                                            <h6>: {{ $item->institution_name }}</h6>
                                            <h6>: {{ date('Y',strtotime($item->graduate_date)) }}</h6>
                                            <h6>: {{ $item->city . ' - ' . $item->country }}</h6>
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
