@extends('layouts.main')
@section('title', 'Cart')

@section('content')
<div class="container">
    @if(isset($order))
    @if(count($order->products) === 0)
    <p>Cart is empty</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        @php
        $i = 1;
        $sum = 0;
        @endphp
        @if(isset($order))
        @foreach($order->products as $product)
        <tbody>
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$product->brand}}</td>
                <td>{{$product->model}}</td>
                <td>{{$product->year}}</td>
                <td>{{$product->price}} USD</td>
                <th><a href="{{ route('cart.product.delete', ['id' => $product->id]) }}">Delete</a></th>

            </tr>
        </tbody>
        @php
        $i++;
        $sum += $product->price;
        @endphp
        @endforeach
        @endif
        <tr>
            <th scope="row">Total:</th>
            <td colspan="2"></td>
            <td></td>
            <th>{{$sum}} USD</th>
        </tr>
    </table>
    <input type="submit" value="Buy">

    @endif
    @else
    <p>Cart is empty</p>
    @endif
</div>
@endsection