<div>
    @section('title')@lang('crud.izin.name')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>@lang('crud.izin.index_title')</h3>
        @endslot
        <li class="breadcrumb-item">@lang('crud.izin.name')</li>
        <li class="breadcrumb-item active">@lang('crud.izin.create_title')</li>
    @endcomponent
</div>
