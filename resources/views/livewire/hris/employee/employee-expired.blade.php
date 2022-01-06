<div>
@section('title')Karyawan Expired
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>List Karyawan Expired</h3>
    @endslot
    <li class="breadcrumb-item">Karyawan Expired</li>
    <li class="breadcrumb-item active">List Karyawan Expired</li>
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
                <h4 class="card-title">List Karyawan Expired</h4>
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
                                DATE
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->nik_company }}</td>
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
