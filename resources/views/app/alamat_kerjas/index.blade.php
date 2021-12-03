<x-admin-layout>
@section('title')@lang('crud.alamat_kerjas.name')
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>@lang('crud.alamat_kerjas.index_title')</h3>
    @endslot
    <li class="breadcrumb-item">@lang('crud.alamat_kerjas.name')</li>
    <li class="breadcrumb-item active">@lang('crud.alamat_kerjas.index_title')</li>
@endcomponent
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">
                        @lang('crud.alamat_kerjas.index_title')
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
                            @can('create', App\Models\AlamatKerja::class)
                            <a
                                href="{{ route('alamat-kerjas.create') }}"
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
                                    ID
                                </th>
                                <th class="text-left">
                                    @lang('crud.alamat_kerjas.inputs.name')
                                </th>
                                <th class="text-left">
                                    @lang('crud.alamat_kerjas.inputs.work_location_id')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($alamatKerjas as $alamatKerja)
                            <tr>
                                <td>{{ $alamatKerja->id ?? '-' }}</td>
                                <td>{{ $alamatKerja->name ?? '-' }}</td>
                                <td>
                                    {{ optional($alamatKerja->workLocation)->name ??
                                    '-' }}
                                </td>
                                <td class="text-center" style="width: 134px;">
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="btn-group"
                                    >
                                        @can('update', $alamatKerja)
                                        <a
                                            href="{{ route('alamat-kerjas.edit', $alamatKerja) }}"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-create"></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $alamatKerja)
                                        <a
                                            href="{{ route('alamat-kerjas.show', $alamatKerja) }}"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $alamatKerja)
                                        <form
                                            action="{{ route('alamat-kerjas.destroy', $alamatKerja) }}"
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
                                <td colspan="3">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">{!! $alamatKerjas->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
