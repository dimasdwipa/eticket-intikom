@extends('layouts.app', ['page' => 'Delete All Data Last Years', 'pageSlug' => 'Delete All Data Last Years', 'section' => 'Delete All Data Last Years'])

@section('content')
    @if(session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-red-600">Confirm Delete Last Year Data</h1>
        <h2 class="text-lg text-gray-700 mt-2">
            <i class="fa fa-warning"></i> Always back up before you delete.
        </h2>
    
        <div class="mt-4">
            <form action="{{ route('delete-data-action') }}" method="POST" onsubmit="return confirmDelete()">
                @csrf
                <button type="submit" class=" btn btn-lg btn-danger bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition">
                    <i class="fas fa-trash-alt" aria-hidden="true"></i> Delete All Last Year's Data
                </button>
            </form>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete last year's data? This action cannot be undone.");
        }
    </script>
    

@endsection
