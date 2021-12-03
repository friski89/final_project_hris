<div class="modal fade" id="usersModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('users.exit', $user) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="usersModalLabel">Employee Resign</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-mb-12">
                            <div class="form-group">
                                <input readonly class="form-control" type="hidden" name="id" id="id" value="{{ $user->id }}">
                            </div>
                        </div>
                        <div class="col-mb-12">
                            <div class="form-group">
                                <label for="name">Employee Name</label>
                                <input readonly class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                                @error('name')
                                    <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-mb-12">
                            <div class="form-group">
                                <label for="end_date">Tanggal Resign</label>
                                <input class="form-control" type="date" name="end_date" id="end_date">
                                @error('end_date')
                                    <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-mb-12">
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" name="note" id="note"></textarea>
                                @error('note')
                                    <p class="text-danger" role="alert">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" type="submit">Apply</button>
                </div>
            </div>
        </form>
    </div>
</div>
