@extends('admin.layouts.main')
@section('title', 'Car details')

@section('content')
<div class="container">
    <div class="col-12">
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-auto d-none d-lg-block">
                            <img src="{{$product->photo}}" alt="">
                        </div>
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo"  name="photo">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" id="brand" value="{{$product->brand}}" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="brand" value="{{$product->model}}" name="model">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="date" class="form-control" id="year" value="{{$product->year}}" name="year">
                    </div>
                    <div class="form-group">
                        <label for="engine_type">Engine type</label>
                        <input type="text" class="form-control" id="engine_type" value="{{$product->engine_type}}" name="engine_type">
                    </div>
                    <div class="form-group">
                        <label for="transmission">Transmission</label>
                        <input type="text" class="form-control" id="transmission" value="{{$product->transmission}}" name="transmission">
                    </div>
                    <div class="form-group">
                        <label for="mileage">Mileage</label>
                        <input type="text" class="form-control" id="mileage" value="{{$product->mileage}}" name="mileage">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" value="{{$product->price}}" name="price">
                    </div>

                    <button type="submit" class="btn btn-primary" name="update">Update</button>

                </form>

                <!-- <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
                    <a href="{{ route('bookmark.add', ['id'=> $product->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Add to bookmarks</ф>
                </div> -->
            </div>
        </div>

    </div>
</div>
</div>
@endsection