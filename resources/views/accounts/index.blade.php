@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
  <ol class="breadcrumb">
    <li class="active">บัญชี</li>
  </ol>
    <div class="panel-regis">
    <div class="heading">ลิสท์บัญชี
      @can('add_accounts')
      <a href="{{ route('accounts.create') }}" class="btn btn-primary "style="float:right;">เพิ่มใหม่</a>
      @endcan
    </div>
    <div class="panel-body">
<table id="myTable" class="table table-striped" >
<thead>
  <tr>
<th>ชื่อ</th>
<th>วันเกิด</th>
<th>เพศ</th>
<!-- <th>Email</th> -->
<th>เบอร์โทรศัพท์</th>
<!-- <th>Address</th> -->
<!-- <th>EmployeeID</th> -->

<th>วันที่เริ่มจ้าง</th>
<th>วันเลิกจ้าง</th>
<th>ค่าจ้าง</th>
<th>บทบาท</th>
@can('edit_accounts', 'delete_accounts')
<th></th>
 @endcan
</tr>
</thead>
<tbody>
    @foreach ($accounts as $user)
    <tr>
      @if( $user->user->roles->implode('name', ', ') === 'Admin')
        <td>{{ $user->name}}</td>
        @else
        <td><a href="{{route('accounts.show', $user->id)}}">{{ $user->name}}</a></td>
      @endif
        <td>{{ $user->birthday}}</td>
        <td>{{ $user->Gender}}</td>
        <!-- <td>{{ $user->email}}</td> -->
        <td>{{ $user->phone}}</td>
        <!-- <td>{{ $user->address}}</td> -->
        <!-- <td>{{ $user->employeeID}}</td> -->

        <td>{{ $user->hiredDate}}</td>
        <td>{{ $user->exitDate}}</td>
        <td>{{ $user->salary}}</td>
        <td>{{ $user->user->roles->implode('name', ', ') }}</td>
        @can('edit_accounts', 'delete_accounts')
        <td>
          @if( $user->user->roles->implode('name', ', ') === 'Admin')

									<a class="btn btn-warning" href="#" disabled>แก้ไข</a>
                  <a class="btn btn-danger" href="#" disabled>ลบข้อมูล</a>
          @else
          {!! Form::open(['method'=>'DELETE', 'route'=>['accounts.destroy',$user->id]]) !!}
									<a class="btn btn-warning" href="{{ route('accounts.edit', $user->id) }}">แก้ไข</a>
									{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                  {!! Form::close() !!}
          @endif
        </td>
         @endcan
           </tr>
    @endforeach

</tbody>

</table>

{!! $accounts->render() !!}

</div>
</div>
</div>
</div>

@endsection
@section('script')

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>

@endsection
