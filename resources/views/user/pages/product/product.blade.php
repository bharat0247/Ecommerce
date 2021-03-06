@extends('user.layouts.app')
@section('title')
    Product Page
@endsection
@section('mainContent')
    <div class="wrapper">
        <div id="page-content" class="page-wrapper section">
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="shop-content">
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="nav shop-tab f-left" role="tablist">
                                        <li>
                                            <a class="active" href="#grid-view" data-toggle="tab"><i
                                                    class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li>
                                            <a href="#list-view" data-toggle="tab"><i
                                                    class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- short-by -->
                                    @if (sizeof($categories) > 0)
                                        <div class="short-by f-left text-center">
                                            <span>Sort by :</span>

                                            <select id="category_list">
                                                @foreach ($categories as $categories_list)
                                                    <option value="{{ $categories_list->id }}">
                                                        {{ $categories_list->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <!-- showing -->
                                    <div class="showing f-right text-right record">
                                        Total Showing : {{ $count_records }}
                                        {{-- <span>Showing : 01-09 of 17.</span> --}}
                                    </div>
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    @if (sizeof($products))
                                        <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                            <div class="row bidst">
                                                @foreach ($products as $product)
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="product-item">
                                                            <div class="product-img">
                                                                <a
                                                                    href="{{ route('userside.single_product', $product->id) }}">
                                                                    <img src="{{ url('uploads/' . $product->product_image) }}"
                                                                        alt="{{ $product->product_image }}"
                                                                        style="max-height: 262px;">
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a
                                                                        href="{{ route('userside.single_product', $product->id) }}">{{ $product->product_name }}</a>
                                                                </h6>

                                                                <div class="rating" id="ratting">
                                                                    <input type="radio" id="star5" name="rating"
                                                                        value="5" /><label class="full" for="star5"
                                                                        title="Awesome - 5 stars"></label>
                                                                    <input type="radio" id="star4half" name="rating"
                                                                        value="4 and a half" /><label class="half"
                                                                        for="star4half"
                                                                        title="Pretty good - 4.5 stars"></label>
                                                                    <input type="radio" id="star4" name="rating"
                                                                        value="4" /><label class="full" for="star4"
                                                                        title="Pretty good - 4 stars"></label>
                                                                    <input type="radio" id="star3half" name="rating"
                                                                        value="3 and a half" /><label class="half"
                                                                        for="star3half" title="Meh - 3.5 stars"></label>
                                                                    <input type="radio" id="star3" name="rating"
                                                                        value="3" /><label class="full" for="star3"
                                                                        title="Meh - 3 stars"></label>
                                                                    <input type="radio" id="star2half" name="rating"
                                                                        value="2 and a half" /><label class="half"
                                                                        for="star2half"
                                                                        title="Kinda bad - 2.5 stars"></label>
                                                                    <input type="radio" id="star2" name="rating"
                                                                        value="2" /><label class="full" for="star2"
                                                                        title="Kinda bad - 2 stars"></label>
                                                                    <input type="radio" id="star1half" name="rating"
                                                                        value="1 and a half" /><label class="half"
                                                                        for="star1half" title="Meh - 1.5 stars"></label>
                                                                    <input type="radio" id="star1" name="rating"
                                                                        value="1" /><label class="full" for="star1"
                                                                        title="Sucks big time - 1 star"></label>
                                                                    <input type="radio" id="starhalf" name="rating"
                                                                        value="half" /><label class="half" for="starhalf"
                                                                        title="Sucks big time - 0.5 stars"></label>
                                                                </div>
                                                                <br>
                                                                <h3 class="pro-price">${!! number_format((float) $product->product_price, 2) !!}</h3>
                                                                <ul class="action-button">
                                                                    @php
                                                                        $wishlist = App\Models\Wishlist::where('product_id', $product->id)->get();
                                                                    @endphp
                                                                    @auth
                                                                        @if (sizeof($wishlist))
                                                                            <li
                                                                                style="background: #FF7F00; border-color: #FF7F00; color: #fff; border-radius: 50%;">
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    class="wishlist_add"
                                                                                    data-id="{{ $product->id }}"
                                                                                    style="background: transparent;border: 1px solid #ddd;border-radius: 50%;color: #FFF;display: block;font-size: 14px;height: 30px;text-align: center;width: 30px;"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        @else
                                                                            <li>
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    data-id="{{ $product->id }}"
                                                                                    class="wishlist_add"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        @endif
                                                                    @else
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-favorite"></i></a>
                                                                        </li>
                                                                    @endauth

                                                                    <li>
                                                                        <a href="javascript:void(0)" class="ShowProduct"
                                                                            title="Quickview"
                                                                            data-id="{{ $product->id }}"><i
                                                                                class="zmdi zmdi-zoom-in"></i></a>
                                                                    </li>
                                                                    @auth
                                                                        <li>
                                                                            <a href="javascript:void(0)" title="Add to cart"
                                                                                class="cart_add"
                                                                                data-id="{{ $product->id }}"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    @endauth

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach

                                                <!-- product-item end -->
                                            </div>
                                            <div class="row bids" style="display: none">

                                            </div>
                                        </div>
                                        <!-- list-view -->
                                        <div id="list-view" class="tab-pane" role="tabpanel">
                                            <div class="row">
                                                @foreach ($products as $product)
                                                    <div class="col-lg-12">
                                                        <div class="shop-list product-item">
                                                            <div class="product-img">
                                                                <a
                                                                    href="{{ route('userside.single_product', $product->id) }}">
                                                                    <img src="{{ url('uploads/' . $product->product_image) }}"
                                                                        alt="" style="max-height: 262px;">
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="clearfix">
                                                                    <h6 class="product-title f-left">
                                                                        <a
                                                                            href="{{ route('userside.single_product', $product->id) }}">{{ $product->product_name }}
                                                                        </a>
                                                                    </h6>

                                                                </div>
                                                                <h6 class="brand-name mb-30">
                                                                    {{ $product->brand->brand_name }}
                                                                </h6>
                                                                <h3 class="pro-price">${!! number_format((float) $product->product_price, 2) !!}</h3>
                                                                <p>{!! Str::limit($product->product_details, 10) !!}</p>
                                                                <ul class="action-button">
                                                                    @php
                                                                        $wishlist = App\Models\Wishlist::where('product_id', $product->id)->get();
                                                                    @endphp
                                                                    @auth
                                                                        @if (sizeof($wishlist))
                                                                            <li
                                                                                style="background: #FF7F00; border-color: #FF7F00; color: #fff; border-radius: 50%;">
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    class="wishlist_add"
                                                                                    data-id="{{ $product->id }}"
                                                                                    style="background: transparent;border: 1px solid #ddd;border-radius: 50%;color: #FFF;display: block;font-size: 14px;height: 30px;text-align: center;width: 30px;"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        @else
                                                                            <li>
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    data-id="{{ $product->id }}"
                                                                                    class="wishlist_add"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        @endif
                                                                    @else
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-favorite"></i></a>
                                                                        </li>
                                                                    @endauth

                                                                    <li>
                                                                        <a href="javascript:void(0)" class="ShowProduct"
                                                                            title="Quickview"
                                                                            data-id="{{ $product->id }}"><i
                                                                                class="zmdi zmdi-zoom-in"></i></a>
                                                                    </li>
                                                                    @auth
                                                                        <li>
                                                                            <a href="javascript:void(0)" title="Add to cart"
                                                                                class="cart_add"
                                                                                data-id="{{ $product->id }}"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    @endauth
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>



                                    @else
                                        <img src="{{ asset('product_Admin/comingsoon.jpg') }}" alt=""
                                            style="height: 500px;width: 500px;margin-left: 197px;margin-bottom: 15px;">
                                    @endif

                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                <ul
                                    class="shop-pagination box-shadow text-center ptblr-10-30 pagination pagination-md justify-content-center">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        @include('user.theme.fliter')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script>
        // var val = $(document).ready(function() {
        //     $("#ratting").click(function() {
        //         var titles = $('input[name=rating]').map(function(idx, elem) {
        //             return $(elem).val();
        //         }).get();

        //         console.log(titles);
        //     });
        // });

    </script>
    <script>
        $(document).ready(function() {
            /* Hover code */
            $('input[name=rating]')
                .on('click', function() {
                    alert('onStar');
                });

        });

    </script>
    <script src="{{ asset('js/product_category.js') }}"></script>
    <script src="{{ asset('js/product_range.js') }}"></script>
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
@endsection
