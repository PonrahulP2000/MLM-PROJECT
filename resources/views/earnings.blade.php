@extends('layouts.app')

@section('content')
    <h2>Earnings</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Amount</th>
                <th>Type</th>
                <th>Level</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($earnings as $earning)
                <tr>
                    <td>${{ $earning->amount }}</td>
                    <td>{{ ucfirst($earning->type) }}</td>
                    <td>{{ $earning->level ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($earning->distribution_date)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
