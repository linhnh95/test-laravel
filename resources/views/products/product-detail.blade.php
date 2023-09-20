@extends('master')

@section('title', 'Product Detail')

@section('header')
    @include('layouts.header')
    @include('layouts.breadcrumb')
@endsection

@section('content')
    <div class="product-detail">
        <div class="row">
            <div class="col-5 images">
                @include('products.product-images', ['mainImage' => $mainImage, 'thumbnails' => $thumbnails])
            </div>
            <div class="col-7 product-information">
                <div class="card">
                    <div class="card-body">
                        <div class="product-title mb-2 d-flex align-items-center justify-content-between">
                            <div class="title">
                                <h2>{{$product->name}}</h2>
                            </div>
                            <div class="product-price border rounded py-2 px-4">
                                {{$product->price}}$
                            </div>
                        </div>
                        <div class="product-brand mb-4">
                            <h5>{{$product->brand->name}}</h5>
                        </div>
                        <div class="product-description mb-4">
                            <div class="tab-content border rounded p-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                                     aria-labelledby="home-tab" tabindex="0">
                                    <h2>Description</h2>
                                    <p>{{$product->description}}</p>
                                </div>
                                <div class="tab-pane fade" id="delivery-tab-pane" role="tabpanel"
                                     aria-labelledby="profile-tab" tabindex="0">
                                    <h2>Delivery</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eius qui sint
                                        ullam! Accusantium asperiores at cum cumque doloremque dolores ea earum esse nam
                                        odit, quod reiciendis sequi tempora veritatis.</p>
                                </div>
                                <div class="tab-pane fade" id="guarantee-tab-pane" role="tabpanel"
                                     aria-labelledby="contact-tab" tabindex="0">
                                    <h2>Guarantees Payment</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci
                                        assumenda debitis dolorem eaque expedita ipsam, ipsum maiores molestiae nesciunt
                                        nostrum officiis placeat quae quasi quibusdam velit veritatis! Mollitia,
                                        possimus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-tabs">
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded active border-0" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#description-tab-pane" type="button" role="tab"
                                            aria-controls="home-tab-pane" aria-selected="true">Description
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded border-0" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#delivery-tab-pane" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Delivery
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded border-0" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#guarantee-tab-pane" type="button" role="tab"
                                            aria-controls="contact-tab-pane" aria-selected="false">Guarantees Payment
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="product-actions d-flex mt-4">
                            <div class="action-amount w-50 d-flex align-items-center">
                                <div class="w-50">Amount:</div>
                                <div class="input-group w-50">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-secondary btn-number"
                                                data-type="minus" data-field="">
                                          -
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                           value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-secondary btn-number"
                                                data-type="plus" data-field="">
                                            +
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="action-add-to-cart w-50 d-flex justify-content-end">
                                <button class="btn btn-primary" id="add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
