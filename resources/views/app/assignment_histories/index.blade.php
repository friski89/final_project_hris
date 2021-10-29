<x-admin-layout>
@section('title')@lang('crud.assignment_histories.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.assignment_histories.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.assignment_histories.name')</li>
    <li class="breadcrumb-item active">@lang('crud.assignment_histories.index_title')</li>
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.assignment_histories.index_title')
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
                        @can('create', App\Models\AssignmentHistory::class)
                        <a
                            href="{{ route('hrm.riwayat_penugasan.create') }}"
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
                <table class="table table-borderless table-head-fixed text-nowrap table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.assignment_histories.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.assignment_histories.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.assignment_histories.inputs.date')
                            </th>
                            <th class="text-left">
                                @lang('crud.assignment_histories.inputs.company_home_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.assignment_histories.inputs.job_title_id')
                            </th>
                            <th class="text-left">
                                Assignment Name
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assignmentHistories as $assignmentHistory)
                        <tr>
                            <td>{{ $assignmentHistory->emp_no ?? '-' }}</td>
                            <td>
                                {{ $assignmentHistory->employee_name ?? '-' }}
                            </td>
                            <td>{{ $assignmentHistory->date ?? '-' }}</td>
                            <td>
                                {{
                                optional($assignmentHistory->companyHome)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($assignmentHistory->jobTitle)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ $assignmentHistory->assignment_name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $assignmentHistory)
                                    <a
                                        href="{{ route('hrm.riwayat_penugasan.edit', $assignmentHistory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light btn-sm"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $assignmentHistory)
                                    <form
                                        action="{{ route('assignment-histories.destroy', $assignmentHistory) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light btn-sm text-danger"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {!! $assignmentHistories->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
