@extends('layouts.frontend.master')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


<div class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="max-w-md bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
          @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form  method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg" placeholder="Your email address" required autofocus>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg" placeholder="Your password" required autocomplete>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Login</button>
              
            </div>
        </form>
    </div>
</div>




 
@endsection