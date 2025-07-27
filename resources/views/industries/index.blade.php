@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Industries</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('industries.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Industry</a>

    <table class="min-w-full mt-4 bg-white">
        <thead>
            <tr class="border-b">
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Description</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($industries as $industry)
                <tr class="border-b">
                    <td class="px-4 py-2 border">{{ $industry->name }}</td>
                    <td class="px-4 py-2 border">{{ $industry->description }}</td>
                    <td class="px-4 py-2 border">{{ $industry->is_active ? 'Active' : 'Inactive' }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('industries.edit', $industry->id) }}" class="text-blue-500 hover:underline mr-2">Edit</a>

                        <form action="{{ route('industries.destroy', $industry->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this industry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
