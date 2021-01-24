@extends('layouts.main')
@section('title', 'Car details')

@section('content')
<div class="container">
    <div class="col-12">
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{$product->brand}}</h3>
                <h5 class="mb-0">{{$product->model}}</h5>
                <div class="mb-1 text-muted">Year: {{$product->year}}</div>
                <div class="mb-1 text-muted">Engine type:  {{$product->engine_type}}</div>
                <div class="mb-1 text-muted">Transmission type: {{$product->transmission}}</div>
                <div class="mb-1 text-muted">Mileage: {{$product->mileage}} km</div>
                <strong class="d-inline-block mb-2 text-primary">Price: {{$product->price}} $</strong>
                <small class="text-muted">{{$product->created_at}}</small>

                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
                    <a href="{{ route('bookmark.add', ['id'=> $product->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Add to bookmarks</ф>
                </div>
            </div>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{$product->photo}}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection