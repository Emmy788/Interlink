@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Edit Industry</h2>

    <form action="{{ route('industries.update', $industry->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Name</label>
            @if(isset($industry))
            <input type="text" name="name" value="{{ old('name', $industry->name) }}" class="w-full border rounded px-3 py-2">
            @endif
        </div>

        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $industry->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_active" value="1" class="form-checkbox"
                    {{ old('is_active', $industry->is_active) ? 'checked' : '' }}>
                <span class="ml-2">Is Active</span>
            </label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">  
            <a href="{{ route('industries.index') }}"> Update </a> 
        </button>
    </form>
</div>
@endsection
