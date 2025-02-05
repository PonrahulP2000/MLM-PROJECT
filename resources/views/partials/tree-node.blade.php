<li>{{ $user->name }}</li>
@if($user->referredUsers->count() > 0)
    <ul>
        @foreach($user->referredUsers as $referral)
            @include('partials.tree-node', ['user' => $referral])
        @endforeach
    </ul>
@endif
