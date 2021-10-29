<x-admin-layout>
@section('title')Home
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>Home</h3>
    @endslot
    <li class="breadcrumb-item active">Welcome</li>
@endcomponent

{{-- @livewire('charts.employee-charts') --}}
</x-admin-layout>



