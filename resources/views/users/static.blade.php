@extends('index')

@section('content')
@component('partials.hero')
{{$user->name}}
@endcomponent
@endsection