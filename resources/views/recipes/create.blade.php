@extends('layouts.app')
@section('content')


<form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">

 @csrf

<!-- Extended default form grid -->

<form>
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="title" id="title" placeholder="title">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="body" id="body" placeholder="Body">
    </div>
    
    <div class="form-group col-md-3">
        <input type="file" name="image" id="image" class="form-control">
    </div>
  </div>
  <!-- Grid row -->
 <a href="{{ route('recipes.index') }}" class="btn btn-warning">Cancel</a>
 <button type="submit"  name="add" class="btn btn-info input-lg">Create Recipe</button>
 </form>
<!-- Extended default form grid -->
 </div>
</form>
@endsection