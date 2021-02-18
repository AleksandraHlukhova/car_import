@extends('layouts.main')

@section('title', 'Profile')
@section('content')
<div class="container-fluide">
    <div class="row no-gutters">
        @include('partials.side-nav')
        <div class="col-10">
            <div class="row no-gutters">
                @isset($propositions)
                @forelse ($propositions as $proposition)
                <div class="col-md-4">
                    <div class="card shadow-sm <?= ($proposition->status === 'pending') ? 'bg-warning' : (($proposition->status === 'agreed') ? 'bg-success': 'bg-danger')?>">
                        <a href="{{ route('product', $proposition->product->id) }}" style="display:inline-block">
                            <img src="{{ env('APP_URL') . $proposition->product->photo}}" alt="" style="position:relative; max-width:100%">
                            <p style="position:absolute; top:0; bottom:0; left:0; right:0; color:white">{{$proposition->product->brand}} | {{$proposition->product->model}}</p>
                        </a>
                        <div class="card-body">
                            <p class="card-text">Price: {{$proposition->product->price}} $</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('product', $proposition->product->id) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{ route('bookmark.add', $proposition->product->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Buy</a>
                                </div>
                                <small class="text-muted">{{$proposition->product->created_at}}</small>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('request.change.status', ['id' => $proposition->id]) }}" method="POST">
                        @csrf
                        <select name="status" id="status">
                            @foreach($statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                            <input type="submit" value="Change status">
                        </select>
                    </form>
                </div>
                @empty
                <p>No propositions</p>
                @endforelse
                @endisset
            </div>
        </div>


    </div>
</div>


@endsection