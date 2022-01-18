<x-admin-layout>
@section('title')Import Leader
 {{ $title }}
@endsection
@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>List Leader</h3>
    @endslot
    <li class="breadcrumb-item">Import Leader</li>
    <li class="breadcrumb-item active">List Leader</li>
@endcomponent
<div class="container">
    @if (isset($errors) && $errors->any())
        <div class="card-alert card red">
            <div class="alert alert-danger" role="alert">
            <p>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </p>
            </div>
        </div>
        @endif
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">List Leader</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-12">
                                <form action="{{ route('leader.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="file">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-red">Upload</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
