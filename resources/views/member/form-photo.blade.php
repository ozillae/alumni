@extends('layouts.member')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Upload Profile Photo</h1>
    <form action="{{ route('member.storePhoto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="code" value="{{ $member->code }}">
        <div class="mb-4">
            <label for="file_profil" class="block text-sm font-medium text-gray-700">Choose Photo</label>
            <input type="file" name="file_profil" id="file_profil" accept="image/*"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   onchange="previewImage(event)">
            @error('file_profil')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <img id="image_preview" src="#" alt="Image Preview" class="hidden w-full h-auto border rounded-md">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Upload</button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image_preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
