@extends('layouts.app')

@section('content')
    <h2>Referral Tree</h2>
    <ul>
        <li>{{ auth()->user()->name }}</li>
        <ul>
            @foreach(auth()->user()->referredUsers as $referral)
                @include('partials.tree-node', ['user' => $referral])
            @endforeach
        </ul>
    </ul>
@endsection
