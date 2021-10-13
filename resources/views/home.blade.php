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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>



