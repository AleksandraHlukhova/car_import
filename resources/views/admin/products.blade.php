@extends('admin.layouts.main')


@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <h2>All products</h2>
    <div class="row">
    <div class="col-12 d-flex justify-content-center mt-4 mb-4">
        <a href="{{ route('admin.product.create') }}" style="text-decoration:none; font-size:20px">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            add new product
        </a>
    </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>photo</th>
                    <th>brand</th>
                    <th>model</th>
                    <th>year</th>
                    <th>engine_type</th>
                    <th>transmission</th>
                    <th>mileage</th>
                    <th>price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td><img src="{{$product->photo}}" alt=""></td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->model}}</td>
                        <td>{{$product->year}}</td>
                        <td>{{$product->engine_type}}</td>
                        <td>{{$product->transmission}}</td>
                        <td>{{$product->mileage}}</td>
                        <td>{{$product->price}} USD</td>
                        <td><a href="{{ route('admin.product.update', ['id' => $product->id]) }}">Update</a></td>
                        <td><a href="{{ route('admin.product.delete', ['id' => $product->id]) }}">Delete</a></td>
                    </tr>
                @empty
                    <p>No users</p>
                @endforelse
                
            </tbody>
        </table>
    </div>
</main>
@endsection