@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-6">Add New Industry</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('industries.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Industry Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="mt-1 w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3"
                      class="mt-1 w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-500">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" name="is_active" id="is_active" value="1"
                   class="form-checkbox h-4 w-4 text-blue-600"
                   {{ old('is_active') ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm text-gray-700">Is Active</label>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit">
                <a href="{{ route('industries.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Save Industry</a>
            </button>

            <a href="{{ route('industries.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection

