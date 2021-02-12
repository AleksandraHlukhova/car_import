@extends('admin.layouts.main')
@section('title', 'Product create')

@section('content')
<div class="container">
    <div class="col-12">
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <form action="{{ route('admin.product.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-auto d-none d-lg-block">
                            <img src="" alt="" name="photo">
                        </div>
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo"  name="photo">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" id="brand" value="" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="brand" value="" name="model">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" value="" name="year">
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
                        <input type="text" class="form-control" id="mileage" value="" name="mileage">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" value="" name="price">
                    </div>

                    <button type="submit" class="btn btn-primary" name="create">Create</button>

                </form>

            </div>
        </div>

    </div>
</div>
</div>
@endsection