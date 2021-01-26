@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

            @can('isAdmin')
                <li class="nav-item">
                    Hello Administrator <br><br>
                    <a href="{{ route('users.index')}}" class="btn btn-primary">View Users</a>
                </li>
            @elsecan('isAuthor')
                <li class="nav-item">
                    Author Account
                </li>
            @else
                <li class="nav-item">
                    Registered Account
                </li>
            @endcan
            </div>
        </div>
    </div>
</div>
@endsection 
