@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Users</h1> 
    <div>
    <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-primary">New User</a>
    <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
    </div>     
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                <div class="col-sm-12">
</div>
            </td>
        </tr>
        <div class="col-sm-12">

                @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
         </div>
  @endif
</div>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection