<x-admin-layout>
    @section('title')@lang('crud.users.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.users.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.users.name')</li>
        <li class="breadcrumb-item active">@lang('crud.users.show_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('users.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.users.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.name')</h5>
                    <span>{{ $user->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.email')</h5>
                    <span>{{ $user->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.avatar')</h5>
                    <x-partials.thumbnail
                        src="{{ $user->avatar ? \Storage::url($user->avatar) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.nik_telkom')</h5>
                    <span>{{ $user->nik_telkom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.nik_company')</h5>
                    <span>{{ $user->nik_company ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.date_in')</h5>
                    <span>{{ $user->date_in ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.band_position_id')</h5>
                    <span
                        >{{ optional($user->bandPosition)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.job_grade_id')</h5>
                    <span>{{ optional($user->jobGrade)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.job_family_id')</h5>
                    <span>{{ optional($user->jobFamily)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.job_function_id')</h5>
                    <span>{{ optional($user->jobFunction)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.city_recuite_id')</h5>
                    <span>{{ optional($user->cityRecuite)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.status_employee_id')</h5>
                    <span
                        >{{ optional($user->statusEmployee)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.company_home_id')</h5>
                    <span>{{ optional($user->companyHome)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.date_sk')</h5>
                    <span>{{ $user->date_sk ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.company_host_id')</h5>
                    <span>{{ optional($user->companyHost)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.sub_status_id')</h5>
                    <span>{{ optional($user->subStatus)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.unit_id')</h5>
                    <span>{{ optional($user->unit)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.place_of_birth')</h5>
                    <span>{{ $user->place_of_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.division_id')</h5>
                    <span>{{ optional($user->division)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.date_of_birth')</h5>
                    <span>{{ $user->date_of_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.work_location_id')</h5>
                    <span
                        >{{ optional($user->workLocation)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.age')</h5>
                    <span>{{ $user->age ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.job_title_id')</h5>
                    <span>{{ optional($user->jobTitle)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.edu_id')</h5>
                    <span>{{ optional($user->edu)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.direktorat_id')</h5>
                    <span>{{ optional($user->direktorat)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.departement_id')</h5>
                    <span>{{ optional($user->departement)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.jabatan_id')</h5>
                    <span>{{ optional($user->jabatan)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.tanggal_kartap')</h5>
                    <span>{{ $user->tanggal_kartap ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.users.inputs.no_sk_kartap')</h5>
                    <span>{{ $user->no_sk_kartap ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.roles.name')</h5>
                    <div>
                        @forelse ($user->roles as $role)
                        <div class="badge badge-primary">{{ $role->name }}</div>
                        <br />
                        @empty - @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\User::class)
                <a href="{{ route('users.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
