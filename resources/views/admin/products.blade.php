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
        @include('admin.partials.product-card')
    </div>
</main>
@endsection