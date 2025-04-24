@extends('layouts.app')

@section('content')
<div class="container p-6">
    <h1>Ceremony List</h1>
    <div class="row">
        @foreach ($ceremony as $event)
            <div class="col-md-4">
                <div class="card mb-4">
                    {{-- Add photo section --}}
                    <img src="{{ $event->photo_url }}" alt="{{ $event->title }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <a href="{{ route('ceremony-detail', $event->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{-- Add pagination links --}}
        {{ $ceremony->links() }}
    </div>
</div>
@endsection