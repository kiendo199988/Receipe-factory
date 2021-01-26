@extends('layouts.app')
@section('content')
<form  method="post" action="{{ route('recipes.update', $recipe->id) }}" enctype="multipart/form-data">

 <!-- @csrf -->
 @csrf
@method('PUT')
<!-- Extended default form grid -->
<form>
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="title" id="title" placeholder="{{$recipe->title}}">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="body" id="body"  placeholder="{{$recipe->body}}">
    </div>
    
    <div class="row">
    <div class="form-group col-md-4">
        <input type="file" name="image" id="image" class="form-control">
        </div>
    <div class="form-group col-md-3">
        <img src="{{ URL::to('/') }}/images/{{ $recipe->image }}" class="rounded-circle" width="60" />
        <input type="hidden" name="hidden_image" value="{{ $recipe->image }}" />
    </div>
    </div>
    
    
    
    
    
    
    <!-- <div class="form-group col-md-3">
        <img src="{{ URL::to('/') }}/images/{{ $recipe->image }}" class="rounded-circle" width="60" />
        <input type="hidden" name="hidden_image" value="{{ $recipe->image }}" />
    </div> -->
    
    <!-- <div class="form-group col-md-3">
        <input type="file" name="image" id="image" class="form-control">
    </div> -->
  </div>
  <!-- Grid row -->
 <a href="{{ route('recipes.index') }}" class="btn btn-warning">Cancel</a>
 <button type="submit"  name="add" class="btn btn-info input-lg">Save Recipe</button>
</form>
<!-- Extended default form grid -->
 </div>
</form>
@endsection


<!-- <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($recipe,['route'=>['recipes.update',$recipe->id],'method'=>'PATCH']) }}
      @include('recipes.form_master')
      {{ Form::close() }}
      <a class="btn btn-primary" href="{{ route('recipes.index') }}"> Back</a>

    </div>

  </div> -->