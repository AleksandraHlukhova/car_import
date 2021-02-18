@extends('layouts.main')

@section('title', 'Profile')
@section('content')
<div class="container-fluide">
    <div class="row no-gutters">
        @include('partials.side-nav')
        <div class="col-10">
            <div class="row no-gutters">
                @isset($products)
                @forelse ($products as $product)
                @include('partials.product-card')
                @empty
                <p>No propositions</p>
                @endforelse
                @endisset
            </div>
        </div>


    </div>
</div>


@endsection