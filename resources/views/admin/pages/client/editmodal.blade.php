<!-- edit modal content -->
                                <div class="modal fade" id="edit-modal{{ $client->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Editing Modal</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Edit your client Data</h5>
                                                {{-- <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p> --}}
                                                <hr>

                                                <form action="{{ route('admin.client.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="id" class="form-control rounded-pill"
                                                        value="{{ $client->id }}">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-rounded" class="col-form-label">
                                                                        Name</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="name"
                                                                        placeholder=" Name" value="{{ $client->name }}">


                                                                </div>
                                                            </div>

                                                            <br>
                                                        </div>
                                                        <div class="col-md-12">

                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">Email</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="email"
                                                                        placeholder=" email" value="{{ $client->email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">


                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">Phone</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="phone"
                                                                        placeholder=" phone" value="{{ $client->phone }}">
                                                                </div>
                                                            </div>


                                                    
                                                            <br><br>
                                                        </div>
                                                        <div class="col-md-12">                                                    
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-rounded"
                                                                        class="col-form-label">Plan</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <select id="example-rounded" class="form-select rounded-pill"  name="plan">
                                                                        @foreach ($plans as $plan)
                                                                            <option value="{{ $plan->id }}"
                                                                                {{ $plan->id == $client->subscribtion?->last()?->plan_id ? 'selected' : '' }}>{{ $plan->name }}</option>

                                                                            
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>


                                                    
                                                            <br><br>
                                                        </div>  
                                                        <div class="col-md-12">


                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">price Paid</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="price_paid"
                                                                        placeholder=" Price Paid" value="{{ $client->subscribtion?->last()?->price_paid }}">
                                                                </div>
                                                            </div>


                                                    
                                                            <br><br>
                                                        </div>
                                                        <div class="col-md-12">


                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">Payment Method</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="payment_method"
                                                                        placeholder=" Payment Method" value="{{ $client->subscribtion?->last()?->payment_method }}">
                                                                </div>
                                                            </div>


                                                    
                                                            <br><br>
                                                        </div>                                                                                             
                                                        <div class="col-md-12">
                                                            
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                <label for="is_blocked" class="col-form-label">Blocked</label>

                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input class="form-check-input" type="checkbox" id="is_blocked" name="is_blocked" value="0" {{ old('is_blocked', $client->is_blocked ?? true) ? 'checked' : '' }}>
                                                                </div>
                                                            </div>                                        
                                                            <br><br>
                                                        </div>
                                                        <br>

                                      
                                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div><!-- /.modal -->