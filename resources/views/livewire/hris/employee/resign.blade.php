<div>
    @section('title')@lang('crud.users.name')
    Employee Resign
    @endsection
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Employee</h3>
        @endslot
        <li class="breadcrumb-item">Employee</li>
        <li class="breadcrumb-item active">List Employee Resign</li>
    @endcomponent

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('users.index') }}" class="mr-4"
                        ><i class="icon ion-md-arrow-back"></i
                    ></a>
                    List Employee Resign
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-head-fixed text-nowrap table-hover">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    Employee Name
                                </th>
                                <th class="text-left">
                                    Nik
                                </th>
                                <th class="text-left">
                                    Note
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name ?? '-' }}</td>
                                <td>{{ $user->nik_company ?? '-' }}</td>
                                <td>{{ $user->employeeResign->note ?? '-' }}</td>
                                <td class="text-center" style="width: 134px;">
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="btn-group"
                                    >
                                        <a href="" class="btn btn-primary" wire:click.prevent="restoreEmployee({{ $user }})">
                                                    Restore
                                                </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="30">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            {{-- <tr>
                                <td colspan="30">{!! $users->render() !!}</td>
                            </tr> --}}
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


