<x-admin-layout>
    @section('title')@lang('Assigned User')
    {{ $title }}
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Assigned User</h3>
        @endslot
        <li class="breadcrumb-item">Roles & Permissions</li>
        <li class="breadcrumb-item active">Assigned User</li>
    @endcomponent
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a
                        href="{{ route('achievement-histories.index') }}"
                        class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    Assigned User
                </h4>
                <div class="table-responsive">
                    <livewire:user-table/>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
