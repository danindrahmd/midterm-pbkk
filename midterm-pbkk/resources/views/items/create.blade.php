<!-- resources/views/items/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md">

            <h1 class="text-2xl font-semibold mb-4">Tambah Item</h1>

            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
                @csrf

                <div class="mb-4">
                    <label for="item_type" class="block text-gray-700 text-sm font-bold mb-2">Tipe Item:</label>
                    <select name="item_type" id="item_type" class="w-full border p-2">
                        @foreach(App\Models\ItemType::all() as $itemType)
                            <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="item_condition" class="block text-gray-700 text-sm font-bold mb-2">Kondisi Item:</label>
                    <select name="item_condition" id="item_condition" class="w-full border p-2">
                        @foreach(App\Models\ItemCondition::all() as $itemCondition)
                            <option value="{{ $itemCondition->id }}">{{ $itemCondition->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                    <textarea name="description" id="description" class="w-full border p-2" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="defects" class="block text-gray-700 text-sm font-bold mb-2">Cacat:</label>
                    <textarea name="defects" id="defects" class="w-full border p-2"></textarea>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Jumlah:</label>
                    <input type="number" name="quantity" id="quantity" class="w-full border p-2" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Upload Gambar:</label>
                    <input type="file" name="image" id="image" class="w-full border p-2">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
                </div>
            </form>

        </div>
    </div>
@endsection
