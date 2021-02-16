@extends('admin.layouts.main')
@section('title', 'Product update')

@section('content')
<div class="container">
    <div class="col-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-auto d-none d-lg-block">
                            @if($product->photo)
                            <img src="{{ env('APP_URL') . $product->photo}}" alt="" style="width:350px; height:150px">
                            <a href="{{ route('admin.photo.delete', ['id' => $product->id]) }}">Delete</a>
                            @endif
                            @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <p>{!! \Session::get('error') !!}</p>
                            </div>
                            @endif
                        </div>
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
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
                        <input type="text" class="form-control" id="year" value="{{$product->year}}" name="year">
                    </div>
                    <div class="form-group">
                        <label for="engine_type">Engine type</label>
                        <select name="engine_type" id="">
                            @foreach($engine_types as $engine_type)
                            <option value="{{ $engine_type }}">{{ $engine_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transmission">Transmission</label>
                        <select name="transmission" id="">
                            @foreach($transmission as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
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