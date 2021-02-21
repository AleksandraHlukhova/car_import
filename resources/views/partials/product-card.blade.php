<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <a href="{{ route('product', $product->id) }}" style="display:inline-block">
            <img src="{{ env('APP_URL') . $product->photo}}" alt="" style="position:relative; max-width:100%">
            <p style="position:absolute; top:0; bottom:0; left:0; right:0; color:white">{{$product->brand}} | {{$product->model}}</p>
        </a>
        <div class="card-body">
            <p class="card-text">Price: {{$product->price}} $</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('product', $product->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="{{ route('bookmark.add', $product->id) }}" 
                        class="btn btn-sm <?= ($product->bookmarks) ? 'btn-success' : 'btn-outline-secondary' ?>">Add to bookmarks</a>
                </div>
                <small class="text-muted">{{$product->created_at}}</small>
            </div>
        </div>
    </div>
</div>