<x-admin-layout>
@section('title')@lang('crud.cash_benefits.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.cash_benefits.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.cash_benefits.name')</li>
    <li class="breadcrumb-item active">@lang('crud.cash_benefits.index_title')</li>
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.cash_benefits.index_title')
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
                        @can('create', App\Models\CashBenefit::class)
                        <a
                            href="{{ route('cash-benefits.create') }}"
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
                                @lang('crud.cash_benefits.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.cash_benefits.inputs.emp_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.cash_benefits.inputs.employee_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.cash_benefits.inputs.jenis_benefit')
                            </th>
                            <th class="text-left">
                                @lang('crud.cash_benefits.inputs.nilai_benefit')
                            </th>
                            <th class="text-left">
                                @lang('crud.cash_benefits.inputs.date')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cashBenefits as $cashBenefit)
                        <tr>
                            <td>
                                {{ optional($cashBenefit->user)->name ?? '-' }}
                            </td>
                            <td>{{ $cashBenefit->emp_no ?? '-' }}</td>
                            <td>{{ $cashBenefit->employee_name ?? '-' }}</td>
                            <td>{{ $cashBenefit->jenis_benefit ?? '-' }}</td>
                            <td>{{ $cashBenefit->nilai_benefit ?? '-' }}</td>
                            <td>{{ $cashBenefit->date ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $cashBenefit)
                                    <a
                                        href="{{ route('cash-benefits.edit', $cashBenefit) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $cashBenefit)
                                    <a
                                        href="{{ route('cash-benefits.show', $cashBenefit) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $cashBenefit)
                                    <form
                                        action="{{ route('cash-benefits.destroy', $cashBenefit) }}"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $cashBenefits->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
