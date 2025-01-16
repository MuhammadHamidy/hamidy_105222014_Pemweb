<table class="table table-schedule">
    <thead>
        @if (Auth::user())
        <tr>
            <th>Nama</th>
            <th>Start</th>
            <th>End</th>
            <th>Actions</th>
        </tr>
        @endif
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $event->name }}</td>
            <td>{{ $event->start }}</td>
            <td>{{ $event->end }}</td>
            <td>
                <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $event->id }}">Edit</button>
                <form method="POST" action="{{ route('event.delete') }}" style="display: inline;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.update') }}">
            @csrf
            <input type="hidden" name="id" id="edit_id">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_name">Nama</label>
                    <input type="text" class="form-control" id="edit_name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="edit_start">Start</label>
                    <input type="date" class="form-control" id="edit_start" name="start" required>
                </div>
                <div class="form-group">
                    <label for="edit_end">End</label>
                    <input type="date" class="form-control" id="edit_end" name="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>