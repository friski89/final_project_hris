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
                    @lang('crud.service_histories.index_title')
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
                        @can('create', App\Models\ServiceHistory::class)
                        <a
                            href="{{ route('service-histories.create') }}"
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
                                @lang('crud.service_histories.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.emoloyee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.start_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.type')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.company_home_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.company_host_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.band_position_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.job_title_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.service_histories.inputs.user_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceHistories as $serviceHistory)
                        <tr>
                            <td>{{ $serviceHistory->emp_no ?? '-' }}</td>
                            <td>{{ $serviceHistory->emoloyee_name ?? '-' }}</td>
                            <td>{{ $serviceHistory->start_date ?? '-' }}</td>
                            <td>{{ $serviceHistory->type ?? '-' }}</td>
                            <td>
                                {{ optional($serviceHistory->companyHome)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($serviceHistory->companyHost)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($serviceHistory->bandPosition)->name
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($serviceHistory->jobTitle)->name ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($serviceHistory->user)->name ?? '-'
                                }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $serviceHistory)
                                    <a
                                        href="{{ route('service-histories.edit', $serviceHistory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $serviceHistory)
                                    <a
                                        href="{{ route('service-histories.show', $serviceHistory) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $serviceHistory)
                                    <form
                                        action="{{ route('service-histories.destroy', $serviceHistory) }}"
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
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">
                                {!! $serviceHistories->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
