@extends('layouts.default')
@section('body')
<br />
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3 class="display-6" align="center">Update a Product</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h6>Name</h6>
                        <input type="text" class="form-control" name="name"/>
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
                        <input type="text" class="form-control" name="price"/>
                    </div>
                    <div class="form-group">
                        <h6>Description</h6>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <h6>Image</h6>
                        <input type="file" class="form-control" name="file"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add product</button>
                </form>
            </div>
    </div>
</div>
@endsection
