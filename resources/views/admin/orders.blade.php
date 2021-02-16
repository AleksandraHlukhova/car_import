@extends('admin.layouts.main')

@section('content')

<div class="col-md-10">
    <h2>Orders</h2>

    <div class="row">

        @foreach($orders as $order)
        @foreach($order->products as $product)

        <div class="col-md-4">
            <a href="#" style="border: 1px solid black; display:inline-block; width:100%; text-decoration: none; color: black">
                <p>Customer name: {{$order->user->name}} {{$order->user->lastName}}</p>
            </a>
            <div class="card mb-4 shadow-sm">
                <a href="#" style="display:inline-block">
                    <img src="{{$product->photo}}" alt="" style="position:relative; max-width:100%">
                    <p style="position:absolute; top:0; bottom:0; left:0; right:0; color:red">{{$product->brand}} | {{$product->model}}</p>
                </a>
                <div class="card-body">
                    <p class="card-text">Price: {{$product->price}} $</p>
                    <div class="d-flex flex-column">
                        <small class="text-muted">Paid status: {{$order->paid_status}}</small>
                        <small class="text-muted">Readiness status: {{$order->readiness_status}}</small>
                    </div>
                </div>
                <form method="POST" action="/profile">
                    @csrf
                </form>
                <select name="" id="">
                    @foreach(config('car_import.paid_status') as $status)
                    <option value="">{{$status}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        @endforeach
        @endforeach
    </div>
</div>

@endsection