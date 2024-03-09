
              <div class="modal" id="loan_{{$loan->id}}" tabindex="-1">
                <form method="post" action="{{route('loan.delete', $loan->id)}}">
                    @csrf
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 style="font-weight:bold;" class="modal-title text-primary">Loan Delete</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this loan request?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </div>
                </div>
                </form>
              </div><!-- End Disabled Animation Modal-->

           
              <div class="modal" id="loan_status_{{$loan->id}}" tabindex="-1">
                <form method="post" action="{{route('admin.loan.status', $loan->id)}}">
                  @csrf
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 style="font-weight:bold;" class="modal-title text-primary">loan Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="col-md-12">
                  <label for="inputCity" class="form-label">Select Status</label>
                  <select class="form-control" name="status" required>
                    <option value="">
                        Select Status
                    </option>
                    @foreach($statuses as $status)
                    <option value="{{$status->name}}" {{$status->name == $loan->status ? "selected": ""}}>{{$status->name}}</option>
                    @endforeach
                  </select>
                </div>
                
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       
                        <button type="submit" class="btn btn-success">Change loan Status
                        </button>
                    </div>
                  </div>
                </div>
                </form>
              </div><!-- End Disabled Animation Modal-->
