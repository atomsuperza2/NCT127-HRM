@extends('layouts.customlayouts')



@section('content')

<div class="container form-container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <ol class="breadcrumb">
            <li><a href="/accounts">Accounts</a></li>
            <li><a href="/accounts/{{$accounts->id}}/profile">Accounts management</a></li>
            <li class="active">Check Attendance</li>
          </ol>
            <div class="panel-regis">
                <div class="heading">Check Attendance</div>

                <div class = "panel-body">
                  <form name = "content" action="{{ route('checkAttendance.submitAttendance', $accounts->id) }}" method="get">

                      <!-- <a id = "buttonEx" class="btn btn-primary" href="{{route('export', $accounts->id) }}">Export</a> -->

                      <label for="Employee" class="col-md-4 control-label">Employee::</label>
                      <div class="col-md-6">
                      <input class="form-control" name="name" type="text" value= "{{$accounts->name}}" disabled>
                      <input class = "form-control" name="user_id" value= "{{$accounts->id}}" type="hidden">
                      </div>

                      <label for="dateStart" class="col-md-4 control-label">Date Start::</label>
                      <div class="col-md-6">
                      <input class="form-control" name="daterangeStart" type="text" value= "{{$cutoff->dateStart}}" disabled>
                      </div>

                      <label for="dateEnd" class="col-md-4 control-label">Date End::</label>
                      <div class="col-md-6">
                      <input class="form-control" name="daterangeEnd" type="text" value= "{{$cutoff->dateEnd}}" disabled>
                      </div>
                      <label for="dateEnd" class="col-md-4 control-label">Shift Start::</label>
                      <div class="col-md-6">
                      <input class="form-control" name="shiftStart" type="hidden" value= "{{$accounts->shiftStart}}" >
                      <input class="form-control" name="Sstart" type="text" value= "{{$accounts->shiftStart}}" disabled>
                      </div>
                      <label for="dateEnd" class="col-md-4 control-label">Shift End::</label>
                      <div class="col-md-6">
                      <input class="form-control" name="shiftEnd" type="hidden" value= "{{$accounts->shiftEnd}}">
                      <input class="form-control" name="SEnd" type="text" value= "{{$accounts->shiftEnd}}" disabled>
                      </div>


              <table  class="table table-striped">

                <tr>
                  <th>Date</th>
                  <th>TimeIn</th>
                  <th>TimeOut</th>
                  <th>HoursWorked</th>
                  <th>Late</th>
                  <th>Overtime</th>
                  <th>Price</th>
                </tr>
                <div class="container">
                  @foreach ($ranges as $date => $value)
                  <?php
                  $correctDate = str_replace('/','-',$value);
                  $attend = $accounts->getAttendanceByDate($correctDate);
                  // echo var_dump($attend->id);
                  ?>
                  <tr>

                          <td><input class="form-control" name="daterange" value="{{$value}}" disabled/>
                            <input class="form-control" name="date[]" value="{{$value}}" type="hidden"/></td>
                          @if( $attend->timeIn == '00:00' || $attend->timeOut == '00:00')
                          <td><input class="form-control" name="timeIn[]" type="time" value="00:00"/></td>
                          <td><input class="form-control" name="timeOut[]" type="time" value="00:00"/></td>
                          @endif

                          @if( $attend->timeIn !== '00:00' || $attend->timeOut !== '00:00' )
                             <td><input class="form-control" name="timeIn[]" type="time" value="{{ $attend->timeIn}}"/></td>
                             <td><input class="form-control" name="timeOut[]" type="time" value="{{ $attend->timeOut}}"/></td>
                           @endif<!-- <td><input class="form-control" name="a_id" type="text" value="{{ isset($accounts->attendance[$date])? $accounts->attendance[$date]->id:'null' }}"/></td> -->
                           <td><input class="form-control" name="hoursWorked[]" type="time" value="{{ $attend->hoursWorked}}" disabled/></td>

                           <td><input class="form-control" name="tardiness[]" type="time" value="{{ $attend->tardiness}}" disabled/></td>
                           <td><input class="form-control" name="overtime[]" type="time" value="{{ $attend->overtime}}" disabled/></td>
                           <td><input class="form-control" name="price[]" type="text" value="{{ $attend->price}}" disabled/></td>
                           <td><input class="form-control" name="a_id[]" type="hidden" value="{{ $attend->id}}" /></td>

                    </tr>
                    @endforeach

                    <tr>
                      <td><center><h4><b>Total</b></h4></center></td>
                      <td> </td>
                      <td> </td>
                      <td><input class="form-control" name="totalHourWork" type="text" value="{{$attend->totalH}}"/></td>
                      <td><input class="form-control" name="totalLate" type="text" value="{{$attend->totalL}}"/></td>
                      <td><input class="form-control" name="totalOT" type="text" value="{{$attend->totalOT}}"/></td>
                      <td><input class="form-control" name="totalPayment" type="text" value="{{$attend->totalP}}"/></td>
                    </tr>


    </div>
      <?=csrf_field(); ?>
  </table>
  <div class="form-group">
    <div class="row">
      <div class="col-md-6">
        <button onclick="goBack()" class="btn btn-danger">Back</button>
      </div>
      <div class="col-md-6 ">
        <button type="submit" class="btn btn-success" style="float:right;">save</button>
      </div>
    </div>
    </div>

  <input type="hidden" name="_token" value="{{csrf_token()}}">

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('script')


<script type="text/javascript">

  function goBack() {
    window.history.back();
}

   </script>


@endsection
