@extends('layouts.default')
@section('body')
    <div class="container">
        <div class="container-fluid">
            <div class="content-wrapper">
                <div class="item-container">
                    <div class="container">
                        <div class="col-md-8">
                            <div class="col-md-3">
                                <img src={{$product->img}} width="300px" alt=""></img>
                            </div>
                            <div class="col-md-6">
                                <h2 class="product-title">{{$product->name}}</h2>
                                <div class="product-desc">{{$product->description}} </div>
                                <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i className="fa fa-star gold"></i> <i className="fa fa-star gold"></i> <i className="fa fa-star-o"></i> </div>
                                <div class="product-stock">${{$product->price}}</div>
                                <hr />
                                <div class="btn-group cart">
                                    <a href="#" id="btn-color-cart" class="btn">Add to Cart</a>
                                    @if(\Illuminate\Support\Facades\Auth::user() != null)
                                    <a href="/wishlist" id="btn-color-wlist" class="btn">View Wishlist</a>
                                    @else
                                        <a href="/login" id="btn-color-wlist" class="btn">View Wishlist</a>
                                        @endif
                                </div>&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

