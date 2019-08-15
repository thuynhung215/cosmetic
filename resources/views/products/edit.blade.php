@extends('layouts.default')
@section('body')
<br />
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h3 class="display-6" align="center">Update a Product</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif
        <form method="post" action="{{ route('products.update', $product->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <h6>Name</h6>
                <input type="text" class="form-control" name="name" value={{ $product->name }} />
            </div>
            <div class="form-group">
                <h6>Catalog</h6>
                <select type="text" class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <h6>Price</h6>
                <input type="text" class="form-control" name="price" value={{ $product->price }} />
            </div>
            <div class="form-group">
                <h6>Description</h6>
                <input type="text" class="form-control" name="description" value={{ $product->description }} />
            </div>
            <div class="form-group">
                <h6>Image</h6>
                <input type="text" class="form-control" name="img" value={{ $product->img }} />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
