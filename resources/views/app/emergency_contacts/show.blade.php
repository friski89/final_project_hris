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
                <a href="{{ route('emergency-contacts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.emergency_contacts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.emergency_contacts.inputs.name')</h5>
                    <span>{{ $emergencyContact->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.emergency_contacts.inputs.contact')</h5>
                    <span>{{ $emergencyContact->contact ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.emergency_contacts.inputs.relation')</h5>
                    <span>{{ $emergencyContact->relation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.emergency_contacts.inputs.profile_id')</h5>
                    <span
                        >{{ optional($emergencyContact->profile)->phone_number
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('emergency-contacts.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\EmergencyContact::class)
                <a
                    href="{{ route('emergency-contacts.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
