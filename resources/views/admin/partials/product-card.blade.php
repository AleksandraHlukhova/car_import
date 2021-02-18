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
                        <td><img src="{{env('APP_URL') . $product->photo}}" alt="" style="width:350px; height:150px"></td>
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