<x-admin-layout>
@section('title')@lang('crud.users.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.users.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.users.name')</li>
    <li class="breadcrumb-item active">@lang('crud.users.index_title')</li>
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
                <h4 class="card-title">@lang('crud.users.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-3">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-6">
                                <form action="{{ route('import.employee') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="file">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-red">Upload</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <a
                                    href="#"
                                    class="btn btn-info" target="_blank"
                                >
                                    <i class="icon ion-md-add"></i>
                                    Export
                                </a>
                            </div>
                            @can('create', App\Models\User::class)
                            <div class="col-md-3">
                                <a
                                    href="{{ route('hrm.employee.create') }}"
                                    class="btn btn-primary"
                                >
                                    <i class="icon ion-md-add"></i>
                                    @lang('crud.common.create')
                                </a>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row d-flex justify-content-end">
                            <!-- <div class="col-md-6"> -->
                                <form action="{{ route('import.profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="file">
                                            <!-- <label class="custom-file-label" for="file">Choose file profile</label> -->
                                        </div>
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-red btn-danger"> Upload file profile</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex justify-content-end">
                            <!-- <div class="col-md-6"> -->
                                <form action="{{ route('import.family') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="file">
                                            <!-- <label class="custom-file-label" for="file">Choose file profile</label> -->
                                        </div>
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-red btn-danger"> Upload file family</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-head-fixed text-nowrap table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.users.inputs.avatar')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.email')
                            </th>

                            <th class="text-left">
                                @lang('crud.users.inputs.nik_telkom')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.nik_company')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.date_in')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.band_position_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.job_grade_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.job_family_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.job_function_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.city_recuite_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.status_employee_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.company_home_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.date_sk')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.company_host_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.sub_status_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.unit_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.place_of_birth')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.division_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.date_of_birth')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.work_location_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.users.inputs.age')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.job_title_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.edu_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.direktorat_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.departement_id')
                            </th>
                            <th class="text-left">
                                Jabatan
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.tanggal_kartap')
                            </th>
                            <th class="text-left">
                                @lang('crud.users.inputs.no_sk_kartap')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $user->avatar_url }}"
                                />
                            </td>
                            <td>{{ $user->name ?? '-' }}</td>
                            <td>{{ $user->email ?? '-' }}</td>

                            <td>{{ $user->nik_telkom ?? '-' }}</td>
                            <td>{{ $user->nik_company ?? '-' }}</td>
                            <td>{{ $user->date_in ?? '-' }}</td>
                            <td>
                                {{ optional($user->bandPosition)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($user->jobGrade)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($user->jobFamily)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($user->jobFunction)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($user->cityRecuite)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($user->statusEmployee)->name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($user->companyHome)->name ?? '-' }}
                            </td>
                            <td>{{ $user->date_sk ?? '-' }}</td>
                            <td>
                                {{ optional($user->companyHost)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($user->subStatus)->name ?? '-' }}
                            </td>
                            <td>{{ optional($user->unit)->name ?? '-' }}</td>
                            <td>{{ $user->place_of_birth ?? '-' }}</td>
                            <td>
                                {{ optional($user->division)->name ?? '-' }}
                            </td>
                            <td>{{ $user->date_of_birth ?? '-' }}</td>
                            <td>
                                {{ optional($user->workLocation)->name ?? '-' }}
                            </td>
                            <td>{{ $user->age ?? '-' }}</td>
                            <td>
                                {{ optional($user->jobTitle)->name ?? '-' }}
                            </td>
                            <td>{{ optional($user->edu)->name ?? '-' }}</td>
                            <td>
                                {{ optional($user->direktorat)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($user->departement)->name ?? '-' }}
                            </td>
                            <td>{{ $user->jabatan ?? '-' }}</td>
                            <td>{{ $user->tanggal_kartap ?? '-' }}</td>
                            <td>{{ $user->no_sk_kartap ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $user)
                                    <a href="{{ route('hrm.employee.edit', $user) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $user)
                                    <a href="{{ route('users.show', $user) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $user)
                                    <button
                                            type="button"
                                            class="btn btn-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#usersModal{{ $user->id }}"
                                        >
                                            <i class="icon ion-md-exit"></i>
                                    </button>
                                    @include('app.users.modal-user')

                                    <form
                                        action="{{ route('users.destroy', $user) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
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
                            <td colspan="30">{!! $users->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <livewire:hris.employee.index /> --}}
</x-admin-layout>
