@extends('admin.layouts.main')


@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <h2>Select products</h2>
    
    <div class="table-responsive">
    <form action="{{ route('admin.proposition.add', ['id' => $id]) }}" class="mb-4">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th></th>
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
                        <td><input type="checkbox" name="id[]" id="" value="{{ $product->id }}"></td>
                        <td><img src="{{env('APP_URL') . $product->photo}}" alt="" style="width:350px; height:150px"></td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->model}}</td>
                        <td>{{$product->year}}</td>
                        <td>{{$product->engine_type}}</td>
                        <td>{{$product->transmission}}</td>
                        <td>{{$product->mileage}}</td>
                        <td>{{$product->price}} USD</td>
                    </tr>
                @empty
                    <p>No users</p>
                @endforelse
                
            </tbody>
        </table>
        <input type="submit" value="Send propositions">
        </form>
    </div>
</main>
@endsection