<x-admin-layout>
@section('title')@lang('crud.all_other_competencies.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.all_other_competencies.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.all_other_competencies.name')</li>
    <li class="breadcrumb-item active">@lang('crud.all_other_competencies.index_title')</li>
@endcomponent
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">
                        @lang('crud.all_other_competencies.index_title')
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
                            @can('create', App\Models\OtherCompetencies::class)
                            <a
                                href="{{ route('all-other-competencies.create') }}"
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
                                    @lang('crud.all_other_competencies.inputs.name')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($allOtherCompetencies as $otherCompetencies)
                            <tr>
                                <td>{{ $otherCompetencies->name ?? '-' }}</td>
                                <td class="text-center" style="width: 134px;">
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="btn-group"
                                    >
                                        @can('update', $otherCompetencies)
                                        <a
                                            href="{{ route('all-other-competencies.edit', $otherCompetencies) }}"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-create"></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $otherCompetencies)
                                        <a
                                            href="{{ route('all-other-competencies.show', $otherCompetencies) }}"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $otherCompetencies)
                                        <form
                                            action="{{ route('all-other-competencies.destroy', $otherCompetencies) }}"
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
                                <td colspan="2">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    {!! $allOtherCompetencies->render() !!}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
