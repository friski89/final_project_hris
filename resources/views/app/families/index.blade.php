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
                <h4 class="card-title">@lang('crud.families.index_title')</h4>
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
                        @can('create', App\Models\Family::class)
                        <a
                            href="{{ route('hrm.data_keluarga.create') }}"
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
                                @lang('crud.families.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.marital_status')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.no_kk')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.family_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.nik_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.place_of_birth')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.date_of_birth')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.gender')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.date_marital')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.religion')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.citizenship')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.work')
                            </th>
                            <th class="text-right">
                                @lang('crud.families.inputs.health_status')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.blood_group')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.blood_rhesus')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.house_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.handphone_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.emergency_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.city')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.province')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.postal_code')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.relationship')
                            </th>
                            <th class="text-right">
                                @lang('crud.families.inputs.alive')
                            </th>
                            <th class="text-right">
                                @lang('crud.families.inputs.urutan')
                            </th>
                            <th class="text-right">
                                @lang('crud.families.inputs.dependent_status')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.families.inputs.edu_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($families as $family)
                        <tr>
                            <td>{{ $family->employee_name ?? '-' }}</td>
                            <td>{{ $family->emp_no ?? '-' }}</td>
                            <td>{{ $family->marital_status ?? '-' }}</td>
                            <td>{{ $family->no_kk ?? '-' }}</td>
                            <td>{{ $family->family_name ?? '-' }}</td>
                            <td>{{ $family->nik_id ?? '-' }}</td>
                            <td>{{ $family->place_of_birth ?? '-' }}</td>
                            <td>{{ $family->date_of_birth ?? '-' }}</td>
                            <td>{{ $family->gender ?? '-' }}</td>
                            <td>{{ $family->date_marital ?? '-' }}</td>
                            <td>{{ $family->religion ?? '-' }}</td>
                            <td>{{ $family->citizenship ?? '-' }}</td>
                            <td>{{ $family->work ?? '-' }}</td>
                            <td>{{ $family->health_status ?? '-' }}</td>
                            <td>{{ $family->blood_group ?? '-' }}</td>
                            <td>{{ $family->blood_rhesus ?? '-' }}</td>
                            <td>{{ $family->house_number ?? '-' }}</td>
                            <td>{{ $family->handphone_number ?? '-' }}</td>
                            <td>{{ $family->emergency_number ?? '-' }}</td>
                            <td>{{ $family->address ?? '-' }}</td>
                            <td>{{ $family->city ?? '-' }}</td>
                            <td>{{ $family->province ?? '-' }}</td>
                            <td>{{ $family->postal_code ?? '-' }}</td>
                            <td>{{ $family->relationship ?? '-' }}</td>
                            <td>{{ $family->alive ?? '-' }}</td>
                            <td>{{ $family->urutan ?? '-' }}</td>
                            <td>{{ $family->dependent_status ?? '-' }}</td>
                            <td>{{ optional($family->user)->name ?? '-' }}</td>
                            <td>{{ optional($family->edu)->name ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $family)
                                    <a
                                        href="{{ route('hrm.data_keluarga.edit', $family) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $family)
                                    <a
                                        href="{{ route('families.show', $family) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $family)
                                    <form
                                        action="{{ route('families.destroy', $family) }}"
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
                            <td colspan="30">{!! $families->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
