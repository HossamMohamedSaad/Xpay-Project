<!-- show modal content -->
<div class="modal fade" id="show-modal{{ $client->id }}" tabindex="-1" role="dialog"
    aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">show Modal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>your client Data</h5>
                {{-- <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p> --}}
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">Name</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill" value="{{ $client->name }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">Email</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill" value="{{ $client->email }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">Phone</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill" value="{{ $client->phone }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">Plan</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client->subscribtion?->last()?->plan?->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">Status</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client?->is_blocked ? 'Blocked' : 'Not blocked' }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <hr>
                    <br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">subscribtion count</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client->subscribtion?->count() }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">last subscribtions start</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client->subscribtion?->last()?->start_date }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">last subscribtions end</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client->subscribtion?->last()?->end_date }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">last subscribtions cash</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client->subscribtion?->last()?->price_paid }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">last subscribtions method</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client->subscribtion?->last()?->payment_method }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-12">
                        <div class="row g-lg-4 g-2">
                            <div class="col-lg-4">
                                <label for="example-rounded" class="col-form-label">last subscribtions status</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control rounded-pill"
                                    value="{{ $client->subscribtion?->last()?->is_active ? 'active' : 'not active' }} {{ $client->subscribtion?->last()?->is_cancelled ? ' & cancelled' : ' & not cancelled' }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <br><br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="submit" class="btn btn-primary">Save
                            changes</button> --}}
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div><!-- /.modal -->