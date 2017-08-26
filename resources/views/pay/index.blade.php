@extends('layouts.customlayouts')
@include('exportPM.selectCutoff')
@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">การจ่ายเงินให้ลูกจ้าง
       <a href="/pay/add" class="btn btn-primary "style="float:right;">เพ่ิมการจ่าย</a>
       <a class="btn btn-info" id="export">ปริ้นรายงาน</a>
    </div>
    <div class="col-md-12">
<table id="myTable" class="table table-striped">
<thead>
  <tr>

<th>ชื่อ</th>
<th>วันที่</th>
<th>ชั่วโมงงาน</th>
<th>เข้าสาย</th>
<th>รวมเป็นเงิน</th>
<th>OT</th>
<th>เงินOT</th>
<th>เงินคงเหลือ</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    @foreach ($pays as $pay)
    <tr>
        <td><a href="{{route('accounts.show', $pay->user_id)}}">{{ $pay->accountinfo->name}}</a></td>
        <td >{{$pay->cutoff->dateStart}} ถึง {{$pay->cutoff->dateEnd}} </td>
        <td>{{$pay->hourswork}} ชม.</td>
        <td>{{$pay->latetime}} ชม.</td>
        <td>{{$pay->ltpay}} บาท</td>
        <td>{{$pay->overtime}} ชม.</td>
        <td>{{$pay->otpay}} บาท</td>
        <td>{{$pay->totalpay}} บาท</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['pay.destroy',$pay->id]]) !!}
									<a class="btn btn-warning" href="{{ route('pay.edit', $pay->id) }}">แก้ไข</a>
									{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
									{!! Form::close() !!}

          </form>
        </td>
    @endforeach

    </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection
@section('script')
  <script type="text/javascript">

    $('#export').on('click',function(){
      $('#selectCutE').modal('show')
    });
  </script>

  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>

@endsection

