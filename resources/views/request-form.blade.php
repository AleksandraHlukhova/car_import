@extends('layouts.main')
@section('title', 'Request')

@section('content')
<div class="container">
    <div class="col-12 mb-4">
    @if(Session::has('flash-notification'))
    @include('partials.notification.flash-notification')
    @endif
    <h4 class="mt-4">Request form</h4>
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static mb-4 mt-4">
                <form action="{{ route('request') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email"  name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" class="form-control" id="phone"  name="phone">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" id="brand" value="" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" value="" name="price">
                    </div>
                    <div class="form-group">
                        <label for="year_from">Year from</label>
                        <input type="text" class="form-control" id="year_from" value="" name="year_from">
                    </div>
                    <div class="form-group">
                        <label for="year_to">Year to</label>
                        <input type="text" class="form-control" id="year_to" value="" name="year_to">
                    </div>

                    <button type="submit" class="btn btn-primary" name="send">Send</button>

                </form>

            </div>
        </div>

    </div>
</div>
</div>
@endsection