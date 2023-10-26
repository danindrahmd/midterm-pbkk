<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite('resources/css/app.css')
    <style>
        body {
            background: url('{{ asset('assets/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .nav-container {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
            min-width: 160px;
            border-radius: 4px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .catalog-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }

        .item-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow-lg">
        <div class="container mx-auto p-4 nav-container">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a class="text-xl font-bold text-slate-400" href="#">Danindra Inventory</a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Welcome, {{ auth()->user()->name }}!</span>

                    <div class="dropdown">
                        <button type="button" class="btn btn-primary">
                            <img src="{{ asset('assets/more.png') }}" alt="Add Memo" class="w-4 h-4 mr-2">
                        </button>
                        <div class="dropdown-content">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Daftar Item</h2>
    <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah Item</a>
</div>

<div class="flex flex-wrap">
    @forelse($items as $item)
        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
            <div class="catalog-item">
                <h3>{{ getItemTypeLabel($item->item_type) }}</h3>
                <p>{{ getItemConditionLabel($item->item_condition) }}</p>
                <p>{{ $item->description }}</p>
                <p>Jumlah: {{ $item->quantity }}</p>
                @if($item->image_paths)
                    <img src="{{ asset('storage/' . $item->image_paths) }}" alt="Item Image" class="item-image">
                @else
                    No Image
                @endif
            </div>
        </div>
    @empty
        <p class="text-center w-full">Tidak ada item.</p>
    @endforelse
</div>

    <script src="{{ mix('js/app.js') }}"></script>
    @vite('resources/js/app.js')

    <script>
        document.getElementById('menu-button').addEventListener('click', function () {
            document.getElementById('menu').classList.toggle('hidden');
        });

        window.addEventListener('click', function (event) {
            if (!event.target.matches('#menu-button')) {
                var dropdown = document.getElementById('menu');
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    </script>

    @if (!function_exists('getItemTypeLabel'))
        @php
        function getItemTypeLabel($itemType) {
            // Sesuaikan dengan daftar label yang sesuai dengan nilai "item_type" di tabel database
            $typeLabels = [
                1 => 'Electronic',
                2 => 'Clothing',
                3 => 'Furniture',
                // ... tambahkan label lainnya sesuai kebutuhan
            ];

            return $typeLabels[$itemType] ?? 'Unknown';
        }
        @endphp
    @endif

    @if (!function_exists('getItemConditionLabel'))
        @php
        function getItemConditionLabel($itemCondition) {
            // Sesuaikan dengan daftar label yang sesuai dengan nilai "item_condition" di tabel database
            $conditionLabels = [
                1 => 'New',
                2 => 'Used',
                3 => 'Refurbished',
                // ... tambahkan label lainnya sesuai kebutuhan
            ];

            return $conditionLabels[$itemCondition] ?? 'Unknown';
        }
        @endphp
    @endif
</body>

</html>