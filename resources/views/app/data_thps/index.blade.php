<x-admin-layout>
@section('title')@lang('crud.data_thps.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.data_thps.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.data_thps.name')</li>
    <li class="breadcrumb-item active">@lang('crud.data_thps.index_title')</li>
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.data_thps.index_title')</h4>
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
                        @can('create', App\Models\DataThp::class)
                        <a
                            href="{{ route('data-thps.create') }}"
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
                                @lang('crud.data_thps.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.base_salary')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.tunjangan_jabatan')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.tunjangan_fixed')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.based_jamsostek')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.no_jamsostek')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.no_bpjs')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.no_npwp')
                            </th>
                            <th class="text-right">
                                @lang('crud.data_thps.inputs.status_pajak')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.no_rekening')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.nama_bank')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.nama_pemilik')
                            </th>
                            <th class="text-left">
                                @lang('crud.data_thps.inputs.user_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataThps as $dataThp)
                        <tr>
                            <td>{{ $dataThp->emp_no ?? '-' }}</td>
                            <td>{{ $dataThp->employee_name ?? '-' }}</td>
                            <td>{{ $dataThp->base_salary ?? '-' }}</td>
                            <td>{{ $dataThp->tunjangan_jabatan ?? '-' }}</td>
                            <td>{{ $dataThp->tunjangan_fixed ?? '-' }}</td>
                            <td>{{ $dataThp->based_jamsostek ?? '-' }}</td>
                            <td>{{ $dataThp->no_jamsostek ?? '-' }}</td>
                            <td>{{ $dataThp->no_bpjs ?? '-' }}</td>
                            <td>{{ $dataThp->no_npwp ?? '-' }}</td>
                            <td>{{ $dataThp->status_pajak ?? '-' }}</td>
                            <td>{{ $dataThp->no_rekening ?? '-' }}</td>
                            <td>{{ $dataThp->nama_bank ?? '-' }}</td>
                            <td>{{ $dataThp->nama_pemilik ?? '-' }}</td>
                            <td>{{ optional($dataThp->user)->name ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $dataThp)
                                    <a
                                        href="{{ route('data-thps.edit', $dataThp) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $dataThp)
                                    <a
                                        href="{{ route('data-thps.show', $dataThp) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $dataThp)
                                    <form
                                        action="{{ route('data-thps.destroy', $dataThp) }}"
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
                            <td colspan="15">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="15">{!! $dataThps->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
