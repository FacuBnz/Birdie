<!-- Modal -->
<div class="modal fade" id="ModalPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route("save") }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title h5" for="content">
                        what are you thinking?</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="3" placeholder="Write here..."></textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </form>
    </div>
</div>
