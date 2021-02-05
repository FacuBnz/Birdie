<div class="card border-light mb-3 shadow-sm bg-white rounded position-static">
    <div class="card-body">
        <button type="button" class="btn btn-outline-primary btn-lg btn-block fixed rounded-pill" data-toggle="modal" data-target="#exampleModal">
            Write new post
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
</div>
<hr>
