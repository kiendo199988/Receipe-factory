@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
<div class="full-right">
<h2>Recipe CRUD</h2>
</div>
 </div>
</div>
@guest
<h2>Please <a href="{{ route('login') }}">login</a> to view recipes</h2>
@else
<table class ="table table-bordered">
<tr>
<th with = "80px">No</th>
<th>Title</th>
<th>Recipe Details</th>
<th>Image</th>
<th with="140px" class="text-center">
<a href="{{route('recipes.create')}}" class="w3-button w3-black">  
Add Recipe
</a>
</th>
</tr>
<?php $no=1; ?>
@foreach ($recipe as $key => $value)
<tr>
<td>{{$no++}}</td>
<td>{{$value->title}}</td>
<td>{{$value->body}}</td>
<td><img src="{{ URL::to('/') }}/images/{{ $value->image }}" class="rounded-circle" width="60" height="50" /></td>
<td>
<a class="btn btn-info btn-sm" href="{{route('recipes.show', $value->id)}}">Show Details</a>
@if($value->user_id == Auth::user()->id)
<a class="btn btn-info btn-sm" href="{{route('recipes.edit', $value->id)}}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['recipes.destroy', $value->id],'style'=>'display:inline']) !!}
              <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">X</button>
            {!! Form::close() !!}
</td>
@endif

</tr>
@endforeach
</table>
@endguest
@endsection 
