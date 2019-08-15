@extends('layouts.default')
@section('body')
    <br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>MY WISHLIST</h2>
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
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                        @foreach($wishlists as $wishlist)
                                            @if(Auth::user()->id==$wishlist->user_id)
                                                <tr align="center">
                                                    <td>{{$wishlist->pname}}</td>
                                                    <td>${{$wishlist->pprice}}</td>
                                                    <td>
                                                        <img src="{{ $wishlist->pimg }}"
                                                             class="css-class"
                                                             alt="alt text"></td>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary" href="/products/{{$wishlist->pro_id}}"> View Product</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>
@endsection
