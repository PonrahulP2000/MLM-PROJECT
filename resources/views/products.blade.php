@extends('layouts.app')

@section('content')
    <h2>Available Products</h2>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        <form method="POST" action="{{ route('purchase', ['id' => $product->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No products available.</p>
        @endforelse
    </div>
@endsection
