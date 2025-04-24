@extends('layouts.app')

@section('content')
<div class="container p-6">
    <h1 class="font-bold">{{ $ceremony->name }}</h1>
    <p>{{ $ceremony->description }}</p>
    <p><strong>Date:</strong> {{ $ceremony->start_date }}</p>
    <p><strong>Location:</strong> {{ $ceremony->location }}</p>

    {{-- Add photo section --}}
    <div class="ceremony-photo">
        <img src="{{ $ceremony->photo_url }}" alt="{{ $ceremony->title }}" class="img-fluid">
    </div>

    <h3>Related Events</h3>
    <ul>
        @foreach($relatedEvents as $event)
            <li>
                <a href="{{ route('guest.ceremony', ['id' => $event->id]) }}">{{ $event->title }}</a>
                <p>{{ Str::limit($event->description, 100) }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection