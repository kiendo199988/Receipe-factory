@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
<div class="full-right">
<h2>Recipe CRUD</h2>
</div>
 </div>
</div>
<table class ="table table-bordered">
<tr>
<th with = "80px">No</th>
<th>Title</th>
<th>Recipe Details</th>
</tr>
<?php $no=1; ?>
@foreach ($recipe as $key => $value)
<tr>
<td>{{$no++}}</td>
<td>{{$value->title}}</td>
<td>{{$value->body}}</td>


</tr>
@endforeach
</table>
@endsection 