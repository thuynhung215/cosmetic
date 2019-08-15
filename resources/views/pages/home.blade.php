@extends('layouts.default')
@section('body')
    @include('includes.header')
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h4 class="my-4" align="center">CATEGORIES</h4>

                <div class="list-group">
                        <a href="{{ route('product-cate', ['id' =>0 ]) }}" class="list-group-item active" id="set-all-item">All products</a>
                        @foreach($categories as $category)
                            <a href="{{ route('product-cate', ['id' => $category->id] )}}"
                               class="list-group-item @if(isset($id) && $category->id==$id) active @endif" >{{$category->name}}</a>
                        @endforeach
                </div>

            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach($products as $key => $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="zoom-pic">
                                    <a href="/products/{!! $product->id !!}">
                                        <img class="card-img-top"
                                             src="{{ $product->img }}"
                                             alt="">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="/products/{{$product->id}}">{{$product->name}}</a>
                                    </h4>
                                    <h6 class="color-price">${{$product->price}}</h6>
                                    @if(\Illuminate\Support\Facades\Auth::user() != null)
                                        <div id="wishlist-{{$product->id}}">
                                            @if(in_array($product->id, $wishlists) )
                                                <?php $color = "red";?>
                                                <div><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/220px-Heart_coraz%C3%B3n.svg.png"
                                                          width="23px"
                                                          height="23px"
                                                          onclick="addWishlist({{ $product->id }},'{{  $color }}' , {{\Illuminate\Support\Facades\Auth::user()->id}})">
                                                </div>
                                            @else
                                                <?php $color = "white";?>
                                                <div><img src="https://png2.kisspng.com/sh/c28621af01fe1e0019ed524130f6b356/L0KzQYm3UsA0N5d7j5H0aYP2gLBuTfJtaZRwRdN3ZD36eLr7hb1pbZJ3jJ9sbHnzPbL5lL14cJp5fZ9xZXH1hH7qjPlxaaN5i58AYUe4SbTrV8djbWU1TpCBNUW2RIqCUsE2OWg7Tak8MEO4QIi8TwBvbz==/kisspng-black-and-white-heart-clip-art-white-heart-cliparts-5a759cd77be406.6553499215176573035075.png"
                                                          width="20px"
                                                          height="20px"
                                                          onclick="addWishlist({{ $product->id }},'{{  $color }}' , {{\Illuminate\Support\Facades\Auth::user()->id}})">
                                                </div>
                                            @endif


                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            {{ $products->links() }}
            <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->


    </div>
@endsection()
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>

    function addWishlist(pro_id, color, user_id) {
        $.ajax({
            url: '/addtowishlist',
            type: 'POST',
            dataType: "text",
            data: {
                _token: "{{ csrf_token() }}",
                pro_id: pro_id,
                color: color,
                user_id: user_id
            },
            success: function (data) {
                var abc = "#wishlist-" + pro_id
                if (color == "red") {
                    $(abc).html('<div><img src="https://png2.kisspng.com/sh/c28621af01fe1e0019ed524130f6b356/L0KzQYm3UsA0N5d7j5H0aYP2gLBuTfJtaZRwRdN3ZD36eLr7hb1pbZJ3jJ9sbHnzPbL5lL14cJp5fZ9xZXH1hH7qjPlxaaN5i58AYUe4SbTrV8djbWU1TpCBNUW2RIqCUsE2OWg7Tak8MEO4QIi8TwBvbz==/kisspng-black-and-white-heart-clip-art-white-heart-cliparts-5a759cd77be406.6553499215176573035075.png"\n' +
                        '                                                      width="20px"\n' +
                        '                                                      height="20px"\n' +
                        '\n' +
                        '                                                      onclick="addWishlist(' + pro_id + ',\'white\' ,' + user_id + ')">\n' +
                        '                                            </div>');
                } else if (color == "white") {
                    $(abc).html('<div><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/220px-Heart_coraz%C3%B3n.svg.png"\n' +
                        '                                                      width="23px"\n' +
                        '                                                      height="23px"\n' +
                        '\n' +
                        '                                                      onclick="addWishlist(' + pro_id + ',\'red\' ,' + user_id + ')">\n' +
                        '                                            </div>');
                }
            },
            error: function (data) {

            }
        });
    }
</script>
