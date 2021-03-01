@extends('layouts.main')


@section('content')
<div class="container-fluide">
    <div class="row no-gutters">
        @include('partials.side-nav')
        <div class="col-10">
            <div class="row no-gutters">
                <h2>All requests</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Year from</th>
                                <th>Year to</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requests as $request)
                            <tr class="<?= ($request->status == 0 ? 'bg-danger' : 'bg-success')?>">
                                <td>{{$request->id}}</td>
                                <td>{{$request->user->name}}</td>
                                <td>{{$request->user->lastName}}</td>
                                <td>{{$request->email}}</td>
                                <td>{{$request->phone}}</td>
                                <td>{{$request->brand}}</td>
                                <td>{{$request->price}}</td>
                                <td>{{$request->year_from}}</td>
                                <td>{{$request->year_to}}</td>

                            </tr>
                            @empty
                            <p>No users</p>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection