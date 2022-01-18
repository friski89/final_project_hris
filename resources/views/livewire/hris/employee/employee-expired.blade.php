<div>
@section('title')Karyawan Habis Kontrak
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>List Karyawan Habis Kontrak</h3>
    @endslot
    <li class="breadcrumb-item">Karyawan Habis Kontrak</li>
    <li class="breadcrumb-item active">List Karyawan Habis Kontrak</li>
@endcomponent
<div class="container">
    @if (isset($errors) && $errors->any())
        <div class="card-alert card red">
            <div class="alert alert-danger" role="alert">
            <p>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </p>
            </div>
        </div>
        @endif
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">List Karyawan Habis Kontrak</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6 ">

                            <div class="input-group">
                                <input
                                class="form-control"
                                    wire:model="searchTerm"
                                    type="text"
                                    placeholder="{{ __('crud.common.search') }}"
                                />
                            </div>

                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-head-fixed text-nowrap table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                NAME
                            </th>
                            <th class="text-left">
                                NIK
                            </th>
                            <th class="text-left">
                                DIREKTORAT
                            </th>
                            <th class="text-left">
                                DIVISI
                            </th>
                            <th class="text-left">
                                DEPARTEMENT
                            </th>
                            <th class="text-left">
                                UNIT
                            </th>
                            <th class="text-left">
                                JABATAN
                            </th>
                            <th class="text-left">
                                ATASAN
                            </th>

                            <th class="text-left">
                                HABIS KONTRAK
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->nik_company }}</td>
                            <td>{{ $employee->direktorat->name }}</td>
                            <td>{{ $employee->division->name }}</td>
                            <td>{{ $employee->departement->name }}</td>
                            <td>{{ $employee->unit->name }}</td>
                            <td>{{ $employee->jabatan }}</td>
                            <td>{{ $employee->leader->atasan1 ?? $employee->leader->atasan2 }}</td>
                            <td>{{ $employee->end_date }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="30">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>{{ $employees->links() }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <livewire:hris.employee.index /> --}}
</div>
