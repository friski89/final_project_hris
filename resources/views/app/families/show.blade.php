<x-admin-layout>
    @section('title')@lang('crud.achievement_histories.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.achievement_histories.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.achievement_histories.name')</li>
        <li class="breadcrumb-item active">@lang('crud.achievement_histories.show_title')</li>
    @endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('families.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.families.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.employee_name')</h5>
                    <span>{{ $family->employee_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.emp_no')</h5>
                    <span>{{ $family->emp_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.marital_status')</h5>
                    <span>{{ $family->marital_status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.no_kk')</h5>
                    <span>{{ $family->no_kk ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.family_name')</h5>
                    <span>{{ $family->family_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.nik_id')</h5>
                    <span>{{ $family->nik_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.place_of_birth')</h5>
                    <span>{{ $family->place_of_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.date_of_birth')</h5>
                    <span>{{ $family->date_of_birth ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.gender')</h5>
                    <span>{{ $family->gender ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.date_marital')</h5>
                    <span>{{ $family->date_marital ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.religion')</h5>
                    <span>{{ $family->religion ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.citizenship')</h5>
                    <span>{{ $family->citizenship ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.work')</h5>
                    <span>{{ $family->work ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.health_status')</h5>
                    <span>{{ $family->health_status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.blood_group')</h5>
                    <span>{{ $family->blood_group ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.blood_rhesus')</h5>
                    <span>{{ $family->blood_rhesus ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.house_number')</h5>
                    <span>{{ $family->house_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.handphone_number')</h5>
                    <span>{{ $family->handphone_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.emergency_number')</h5>
                    <span>{{ $family->emergency_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.address')</h5>
                    <span>{{ $family->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.city')</h5>
                    <span>{{ $family->city ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.province')</h5>
                    <span>{{ $family->province ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.postal_code')</h5>
                    <span>{{ $family->postal_code ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.relationship')</h5>
                    <span>{{ $family->relationship ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.alive')</h5>
                    <span>{{ $family->alive ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.urutan')</h5>
                    <span>{{ $family->urutan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.dependent_status')</h5>
                    <span>{{ $family->dependent_status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.user_id')</h5>
                    <span>{{ optional($family->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.families.inputs.edu_id')</h5>
                    <span>{{ optional($family->edu)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('families.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Family::class)
                <a href="{{ route('families.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
