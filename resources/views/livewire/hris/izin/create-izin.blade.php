<div>
    @section('title')@lang('crud.izin.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.izin.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.izin.name')</li>
        <li class="breadcrumb-item active">@lang('crud.izin.create_title')</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('service-histories.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.izin.create_title')
                </h4>
            </div>
            <form autocomplete="off" wire:submit.prevent="createForm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="emp_no">Employe Number</label>
                                    <input type="text" wire:model="state.emp_no" class="form-control" id="emp_no" placeholder="Employee Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="emp_no">Employe Name</label>
                                    <input type="text" wire:model="state.emp_name" class="form-control" id="emp_name" placeholder="Employee Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="izin_category">Izin Category</label>
                                    <select class="form-control" id="izin_category" wire:model="state.izin_category">
                                        <option value="" selected>Izin Category</option>
                                        <option value="pernikahan_karyawan">Pernikan Karyawan</option>
                                        <option value="pernikahan_anak_karyawan">Pernikahan Anak Karyawan</option>
                                        <option value="kedukaan_keluarga">Kedukaan Keluarga</option>
                                        <option value="kedukaan_kerabat">Kedukaan Kerabat</option>
                                        <option value="istri_bersalin_atau_keguguran">Istri Bersalin / Keguguran</option>
                                        <option value="khitan_atau_baptis">Khitan / Baptis</option>
                                        <option value="ibadah_keagamaan">Ibadah Keagamaan</option>
                                        <option value="keperluan_pribadi">Keperluan Pribadi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="date_start">Date Start</label>
                                    <input type="date" wire:model="state.date_start" class="form-control" id="date_start" placeholder="Date Start">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="date_end">Date End</label>
                                    <input type="date" wire:model="state.date_end" class="form-control" id="date_end" placeholder="Date End">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="date_end">Remakrs</label>
                                    <textarea class="form-control" wire:model="state.remarks" id="remarks" placeholder="Remakrs"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="date_start">Document (optional)</label>
                                    <input type="file" wire:model="state.document" class="form-control" id="document" placeholder="Document">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
