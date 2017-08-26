<div class="modal fade" id="selectCutE" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">เลือกช่วงเวลาจ่ายยอด</h3>
        <div class="model-body">
          {!! Form::open(['method'=>'GET', 'route'=>['pay.exportPM']]) !!}
            <div class="form-group">
              <select class="form-control" name="cutoff_id">
                @foreach ($cutoff as $cutoffs)
                  <option value="{{$cutoffs->id}}"> {{$cutoffs->dateStart}} ถึง {{$cutoffs->dateEnd}}</option>
                @endforeach
              </select>
            </div>


            {!! Form::submit('Select', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
