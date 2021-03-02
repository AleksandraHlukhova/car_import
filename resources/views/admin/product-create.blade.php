@extends('admin.layouts.main')
@section('title', 'Product create')

@section('content')
<div class="container">
    <div class="col-12">
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-auto d-none d-lg-block">
                            <img src="" alt=""">
                        </div>
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo"  name="photo">
                        @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" id="brand" 
                        value="{{old('brand')}}" name="brand">
                        @error('brand')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" 
                        value="{{old('model')}}" name="model">
                        @error('model')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" 
                        value="{{old('year')}}" name="year">
                        @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                        <input type="text" class="form-control" id="mileage" 
                        value="{{old('year')}}" name="mileage">
                        @error('mileage')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" 
                        value="{{old('price')}}" name="price">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" name="create">Create</button>

                </form>

            </div>
        </div>

    </div>
</div>
</div>
@endsection