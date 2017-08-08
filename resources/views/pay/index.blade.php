@extends('layouts.customlayouts')
@include('exportPM.selectCutoff')
@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Pay For employee
       <a href="/pay/add" class="btn btn-primary "style="float:right;">New Pay</a>
       <a class="btn btn-info" id="export">export</a>
    </div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>

<th>ชื่อ</th>
<th>ชั่วโมงงานทั้งหมด</th>

<th>เข้างานสาย</th>
<th>รวมเป็นเงิน</th>
<th>OT(งานนอกเวลา)</th>
<th>เงินนอกเวลา</th>
<th>จำนวนเงินคงเหลือ</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($pays as $pay)
    <tr>
        <td><a href="{{route('accounts.show', $pay->user_id)}}">{{ $pay->accountinfo->name}}</a></td>
        
        <td>{{$pay->hourswork}} ชม.</td>
        <td>{{$pay->latetime}} ชม.</td>
        <td>{{$pay->ltpay}} บาท</td>
        <td>{{$pay->overtime}} ชม.</td>
        <td>{{$pay->otpay}} บาท</td>
        <td>{{$pay->totalpay}} บาท</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['pay.destroy',$pay->id]]) !!}
									<a class="btn btn-warning" href="{{ route('pay.edit', $pay->id) }}">Edit</a>
									{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
									{!! Form::close() !!}

          </form>
        </td>
    @endforeach

    </tr>
</div>
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



@endsection
