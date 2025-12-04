<!-- delete modal content -->
<div id="delete-modal{{ $plan->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Are You Want To Delete It</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Press Delete. </h5>
                <p>If you delete it you will not be able to recover it</p>
                {{--
                <hr> --}}
                <form action="{{ route('admin.plan.destroy') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" class="form-control rounded-pill" value="{{ $plan->id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Delete</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->