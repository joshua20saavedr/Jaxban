<!-- resources/views/inventory/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Inventory Item</h2>
        <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- This is important for update requests -->
    
    <div class="form-group">
        <label for="name">Item Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $inventory->name) }}" required>
    </div>
    
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $inventory->quantity) }}" required>
    </div>
    
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $inventory->price) }}" step="0.01" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Update Item</button>
</form>

    </div>
@endsection
