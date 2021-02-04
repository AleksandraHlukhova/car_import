@extends('admin.layouts.main')


@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <h2>All customers</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Requests</th>
                    <th>Orders</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->lastName}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->requests->count()}}</td>
                        <td>{{$customer->orders->count()}}</td>
                    </tr>
                @empty
                    <p>No users</p>
                @endforelse
                
            </tbody>
        </table>
    </div>
</main>
@endsection