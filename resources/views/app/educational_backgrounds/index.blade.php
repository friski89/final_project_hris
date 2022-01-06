<x-admin-layout>
@section('title')@lang('crud.achievement_histories.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.achievement_histories.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.achievement_histories.name')</li>
    <li class="breadcrumb-item active">@lang('crud.achievement_histories.index_title')</li>
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.educational_backgrounds.index_title')
                </h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\EducationalBackground::class)
                        <a
                            href="{{ route('educational-backgrounds.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.institution_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.faculty')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.major')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.graduate_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.cost_category')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.scholarship_institution')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.gpa')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.gpa_scale')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.default')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.start_year')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.city')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.state')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.country')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.educational_backgrounds.inputs.edu_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($educationalBackgrounds as
                        $educationalBackground)
                        <tr>
                            <td>{{ $educationalBackground->emp_no ?? '-' }}</td>
                            <td>
                                {{ $educationalBackground->employee_name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $educationalBackground->institution_name ??
                                '-' }}
                            </td>
                            <td>
                                {{ $educationalBackground->faculty ?? '-' }}
                            </td>
                            <td>{{ $educationalBackground->major ?? '-' }}</td>
                            <td>
                                {{ $educationalBackground->graduate_date ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $educationalBackground->cost_category ?? '-'
                                }}
                            </td>
                            <td>
                                {{
                                $educationalBackground->scholarship_institution
                                ?? '-' }}
                            </td>
                            <td>{{ $educationalBackground->gpa ?? '-' }}</td>
                            <td>
                                {{ $educationalBackground->gpa_scale ?? '-' }}
                            </td>
                            <td>
                                {{ $educationalBackground->default ?? '-' }}
                            </td>
                            <td>
                                {{ $educationalBackground->start_year ?? '-' }}
                            </td>
                            <td>{{ $educationalBackground->city ?? '-' }}</td>
                            <td>{{ $educationalBackground->state ?? '-' }}</td>
                            <td>
                                {{ $educationalBackground->country ?? '-' }}
                            </td>
                            <td>
                                {{ optional($educationalBackground->user)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($educationalBackground->edu)->name
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $educationalBackground)
                                    <a
                                        href="{{ route('educational-backgrounds.edit', $educationalBackground) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $educationalBackground)
                                    <a
                                        href="{{ route('educational-backgrounds.show', $educationalBackground) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete',
                                    $educationalBackground)
                                    <form
                                        action="{{ route('educational-backgrounds.destroy', $educationalBackground) }}"
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
                            <td colspan="18">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="18">
                                {!! $educationalBackgrounds->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
