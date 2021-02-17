@extends('admin.layouts.main')

@section('content')

<div class="col-md-10">
    <h2>Orders</h2>

    <div class="row">

        @foreach($orders as $order)
        @foreach($order->products as $product)

        <div class="col-md-4 mb-4">
            <a href="#"
                style="border: 1px solid black; display:inline-block; width:100%; text-decoration: none; color: black">
                <p>Customer name: {{$order->user->name}} {{$order->user->lastName}}</p>
            </a>
            <div class="card shadow-sm">
                <a href="#" style="display:inline-block">
                    <img src="{{env('APP_URL') . $product->photo}}" alt="" style="position:relative; max-width:100%">
                    <p style="position:absolute; top:0; bottom:0; left:0; right:0; color:red">{{$product->brand}} |
                        {{$product->model}}</p>
                </a>
                <div class="card-body">
                    <p class="card-text">Price: {{$product->price}} $</p>
                    <div class="d-flex flex-column">
                        <small class="<?= ($order->paid_status === 'paid') ? 'text-success' : 'text-danger'?>">Paid status: {{$order->paid_status}}</small>
                        <small class="<?= (($order->readiness_status === 'done') ? 'text-success' : (($order->readiness_status === 'processing') ? 'text-warning' : 'text-danger'))?>">Readiness status: {{$order->readiness_status}}</small>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.order.paid-status.edit', ['id' => $order->id]) }}">
                @csrf
                <label for="paid_status">Change paid status:</label>
                <select name="paid_status" id="paid_status">
                    @foreach(config('car_import.paid_status') as $status)
                    <option value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Change">
            </form>
            <form method="POST" action="{{ route('admin.order.readiness-status.edit', ['id' => $order->id]) }}">
                @csrf
                <label for="readiness_status">Change readiness status:</label>
                <select name="readiness_status" id="readiness_status">
                    @foreach(config('car_import.readiness_status') as $status)
                    <option value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Change">
            </form>

        </div>

        @endforeach
        @endforeach
    </div>
</div>

@endsection