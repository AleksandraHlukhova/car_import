@extends('layouts.main')
@section('title', 'Cart')

@section('content')
<div class="container">
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
            </tr>
        </thead>
        @php
        $i = 1;
        $sum = 0;
        @endphp
        @foreach($order->products as $product)
        <tbody>
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$product->brand}}</td>
                <td>{{$product->model}}</td>
                <td>{{$product->year}}</td>
                <td>{{$product->price}} USD</td>
            </tr>
        </tbody>
        @php
        $i++;
        $sum += $product->price;
        @endphp
        @endforeach
        <tr>
            <th scope="row">Total:</th>
            <td colspan="2"></td>
            <td></td>
            <th>{{$sum}} USD</th>
        </tr>
    </table>
    @endif
    <input type="submit" value="Buy">
</div>
@endsection