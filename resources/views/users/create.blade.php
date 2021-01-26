@can('isAdmin')

@extends('layouts.app')

@section('content')


<div class="w-full max-w-xs mx-auto">
  <form method="POST" action="{{ route('users.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
     @csrf
     <div class="mb-4">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
        Name
      </label>
      <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-red' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                <p class="text-red-500 text-xs italic" role="alert">{{ $errors->first('name') }}</p>
                @endif
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        E-Mail
      </label>
      <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <p class="text-red-500 text-xs italic" role="alert">{{ $errors->first('email') }}</p>
                @endif
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red' : '' }}" name = "password" type = "password">
                @if ($errors->has('password'))
                <p class="text-red-500 text-xs italic" role="alert">{{ $errors->first('password') }}</p>
                @endif
    </div>

    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password-confirm">
        Confirm Password
      </label>
      <input id="password-confirm" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name = "password_confirmation" type = "password">
                
    </div>

    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Create
      </button>
      <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
    </div>
  </form>
</div>


@endsection


@elsecan
return redirect('/home');

@endcan