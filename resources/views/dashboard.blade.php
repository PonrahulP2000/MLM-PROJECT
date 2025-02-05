@extends('layouts.app')

@section('content')
    <h2>Welcome, {{ auth()->user()->name }}!</h2>
    <p>Select an option below:</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">💰 Earnings</h5>
                    <p class="card-text">Check your earnings from direct and level commissions.</p>
                    <a href="{{ route('earnings') }}" class="btn btn-primary">View Earnings</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">🛒 Products</h5>
                    <p class="card-text">Buy products and earn commissions.</p>
                    <a href="{{ route('products') }}" class="btn btn-success">View Products</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">🌳 Referral Tree</h5>
                    <p class="card-text">View your referral hierarchy.</p>
                    <a href="{{ route('tree') }}" class="btn btn-info">View Referral Tree</a>
                </div>
            </div>
        </div>
    </div>
@endsection
