@extends('layouts.main')

@section('title', 'Home')
@section('content')
<main role="main">

    <section class="text-center mt-4 mb-4">
        <div class="container">
            <h2 class="jumbotron-heading">Our car proposition</h2>
            <a href="{{ route('request') }}">Send request to us</a>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @forelse($products as $product)
                @include('partials.product-card')
                @empty
                <p>No cars</p>
                @endforelse

            </div>
        </div>
    </div>

</main>
@endsection
