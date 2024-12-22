@extends('layouts.app')

@section('title', 'Inventory Management')

@section('content')
    <div class="container">
        <h1>Inventory Management</h1>
        
        <!-- Display success message after adding, updating, or deleting an item -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Inventory List Table -->
        <div class="inventory-list">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('inventory.edit', $item->id) }}" class="btn-edit">Edit</a>
                                <!-- Delete Button -->
                                <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add New Item Form -->
        <div class="add-item">
            <h2>Add New Item</h2>
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" id="item_name" name="item_name" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" step="0.01" required>
                </div>
                <button type="submit" class="btn-add">Add Item</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
<link href="{{ asset('css/inventory-management.css') }}" rel="stylesheet">
@endsection
