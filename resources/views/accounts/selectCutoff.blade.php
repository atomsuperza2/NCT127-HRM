<div class="modal fade" id="selectCut" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">เลือกการจ่ายยอด </h3>
        <div class="model-body">
            <form action="{{ route('checkAttendance.check', $accounts->id) }}" method="get">
              <div class="form-group">
                  {!! Form::select('id', $cutoff, null, ['name' => 'cutoffId','placeholder' => 'เลือกช่วงเวลา', 'class'=>'form-control']) !!}
              </div>
              <button type='submit' class="btn btn-success" href="">เลือก</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
