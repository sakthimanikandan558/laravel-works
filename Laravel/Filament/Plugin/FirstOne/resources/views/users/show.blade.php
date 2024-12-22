@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">User Details</h1>
    <div class="bg-gray-100 p-4 rounded-md">
        <p class="text-lg font-medium mb-2">
            <span class="text-gray-600">Name:</span> {{ $user->name }}
        </p>
        <p class="text-lg font-medium">
            <span class="text-gray-600">Email:</span> {{ $user->email }}
        </p>
    </div>
</div>
@endsection
