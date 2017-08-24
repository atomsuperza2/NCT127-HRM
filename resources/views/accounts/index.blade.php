@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
  <ol class="breadcrumb">
    <li class="active">Accounts</li>
  </ol>
    <div class="panel-regis">
    <div class="heading">Accounts
      @can('add_accounts')
      <a href="{{ route('accounts.create') }}" class="btn btn-primary "style="float:right;">New accounts</a>
      @endcan
    </div>
    <div class="panel-body">
<table id="myTable" class="table table-striped" >
<thead>
  <tr>
<th>Name</th>
<th>Birthday</th>
<th>Gender</th>
<!-- <th>Email</th> -->
<th>Phone</th>
<!-- <th>Address</th> -->
<!-- <th>EmployeeID</th> -->

<th>HiredDate</th>
<th>ExitDate</th>
<th>Salary</th>
<th>Role</th>
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

									<a class="btn btn-warning" href="#" disabled>Edit</a>
                  <a class="btn btn-danger" href="#" disabled>Delete</a>
          @else
          {!! Form::open(['method'=>'DELETE', 'route'=>['accounts.destroy',$user->id]]) !!}
									<a class="btn btn-warning" href="{{ route('accounts.edit', $user->id) }}">Edit</a>
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
