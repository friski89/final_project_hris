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
                <a
                    href="{{ route('educational-backgrounds.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.educational_backgrounds.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.educational_backgrounds.inputs.emp_no')</h5>
                    <span>{{ $educationalBackground->emp_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.employee_name')
                    </h5>
                    <span
                        >{{ $educationalBackground->employee_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.institution_name')
                    </h5>
                    <span
                        >{{ $educationalBackground->institution_name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.faculty')
                    </h5>
                    <span>{{ $educationalBackground->faculty ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.educational_backgrounds.inputs.major')</h5>
                    <span>{{ $educationalBackground->major ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.graduate_date')
                    </h5>
                    <span
                        >{{ $educationalBackground->graduate_date ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.cost_category')
                    </h5>
                    <span
                        >{{ $educationalBackground->cost_category ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.scholarship_institution')
                    </h5>
                    <span
                        >{{ $educationalBackground->scholarship_institution ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.educational_backgrounds.inputs.gpa')</h5>
                    <span>{{ $educationalBackground->gpa ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.gpa_scale')
                    </h5>
                    <span>{{ $educationalBackground->gpa_scale ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.default')
                    </h5>
                    <span>{{ $educationalBackground->default ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.start_year')
                    </h5>
                    <span>{{ $educationalBackground->start_year ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.educational_backgrounds.inputs.city')</h5>
                    <span>{{ $educationalBackground->city ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.educational_backgrounds.inputs.state')</h5>
                    <span>{{ $educationalBackground->state ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.country')
                    </h5>
                    <span>{{ $educationalBackground->country ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.educational_backgrounds.inputs.user_id')
                    </h5>
                    <span
                        >{{ optional($educationalBackground->user)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.educational_backgrounds.inputs.edu_id')</h5>
                    <span
                        >{{ optional($educationalBackground->edu)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('educational-backgrounds.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\EducationalBackground::class)
                <a
                    href="{{ route('educational-backgrounds.create') }}"
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
