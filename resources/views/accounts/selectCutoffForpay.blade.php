<div class="modal fade" id="selectCutP" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Select CUT-OFF </h3>
        <div class="model-body">
            <form action="{{ route('payforuser.usercreatepay', $accounts->id) }}" method="get">

                <div class="form-group">
                    {!! Form::select('id', $cutoff, null, ['name' => 'cutoff_id','placeholder' => 'Select Cutoff', 'class'=>'form-control']) !!}
                </div>

              <button type='submit' class="btn btn-success" href="">Select</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
