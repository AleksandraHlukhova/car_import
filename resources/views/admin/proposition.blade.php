@extends('admin.layouts.main')


@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-4">

    <h2>Propositins for {{ $user->name }} {{ $user->lastName }}</h2>

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
                    <th< /th>
                    <th< /th>
                </tr>
            </thead>
            <tbody>
                @forelse ($propositions as $proposition)
                <tr class="<?= ($proposition->status === 'agreed') ? 'bg-success' : (($proposition->status === 'pending') ? 'bg-warning' : 'bg-danger')?>">
                <td><img src="{{env('APP_URL') . $proposition->product->photo}}" alt=""
                        style="width:350px;"></td>
                <td>{{$proposition->product->brand}}</td>
                <td>{{$proposition->product->model}}</td>
                <td>{{$proposition->product->year}}</td>
                <td>{{$proposition->product->engine_type}}</td>
                <td>{{$proposition->product->transmission}}</td>
                <td>{{$proposition->product->mileage}}</td>
                <td>{{$proposition->product->price}} USD</td>
                <td><a href="{{ route('product', ['id' => $proposition->product->id]) }}">Details</a></td>
                <td><a href="{{ route('admin.proposition.delete', ['id' => $proposition->id]) }}">Delete</a></td>
                </tr>
                @empty
                <p>No propositions</p>
                @endforelse
            </tbody>
        </table>


    </div>
</main>
@endsection