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
                    @lang('crud.insurance_facilities.index_title')
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
                        @can('create', App\Models\InsuranceFacility::class)
                        <a
                            href="{{ route('insurance-facilities.create') }}"
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
                                @lang('crud.insurance_facilities.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.jenis_asuransi')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.provider_asuransi')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.nama_peserta')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.status_peserta')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.date')
                            </th>
                            <th class="text-left">
                                @lang('crud.insurance_facilities.inputs.peserta_manfaat')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($insuranceFacilities as $insuranceFacility)
                        <tr>
                            <td>
                                {{ optional($insuranceFacility->user)->name ??
                                '-' }}
                            </td>
                            <td>{{ $insuranceFacility->emp_no ?? '-' }}</td>
                            <td>
                                {{ $insuranceFacility->employee_name ?? '-' }}
                            </td>
                            <td>
                                {{ $insuranceFacility->jenis_asuransi ?? '-' }}
                            </td>
                            <td>
                                {{ $insuranceFacility->provider_asuransi ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $insuranceFacility->nama_peserta ?? '-' }}
                            </td>
                            <td>
                                {{ $insuranceFacility->status_peserta ?? '-' }}
                            </td>
                            <td>{{ $insuranceFacility->date ?? '-' }}</td>
                            <td>
                                {{ $insuranceFacility->peserta_manfaat ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $insuranceFacility)
                                    <a
                                        href="{{ route('insurance-facilities.edit', $insuranceFacility) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $insuranceFacility)
                                    <a
                                        href="{{ route('insurance-facilities.show', $insuranceFacility) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $insuranceFacility)
                                    <form
                                        action="{{ route('insurance-facilities.destroy', $insuranceFacility) }}"
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
                                {!! $insuranceFacilities->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
