@extends('layouts.member')

@section('content')
<div class="container">
    <div class="bg-green-100 p-6 shadow-md">
    <h1>Member Dashboard</h1>
    <p>Welcome to the member dashboard!</p>
    </div>
    
    <div class="bg-green-100 p-6 shadow-md mt-10">

    <h2><i class="fas fa-user"></i> Your Profile</h2>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone:</strong> {{ displayPhoneNumber($user->phone) }}</p>
    </div>
</div>
@endsection