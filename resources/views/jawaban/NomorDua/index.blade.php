<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.submit') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="start">Start</label>
                    <input class="form-control" type="date" name="start" id="start" required>
                </div>
                <div class="form-group">
                    <label for="end">End</label>
                    <input class="form-control" type="date" name="end" id="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>