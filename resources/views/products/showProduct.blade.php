@extends('layouts.default')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Products List</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('products.create')}}"> Create Product</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="text">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead align="center">
                                <tr bgcolor="#faebd7">
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th colspan=2>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr align="center">
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->cname}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td><img src="{{ $product->img }}" class="css-class"
                                                 alt="alt text"></td>
                                        <td>
                                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id]]) !!}
                                            <button
                                                class="btn btn-danger"
                                                onclick="return confirm('are you sure?')">Delete
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>

@endsection
