@extends('master')

@section('title', 'Product List')

@section('header')
    @include('layouts.header')
    <div class="w-100 mt-4">
        <a class="btn btn-secondary" href="/manage">Go to Admin</a>
    </div>
@endsection

@section('content')
    <div class="product-list mt-4">
        <div class="row">
            <div class="col-12">
                <div class="row text-center text-lg-start">

                    @if($products->isNotEmpty())
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="/product/{{$product->id}}" class="d-block mb-4 h-100">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{$product->main_image->link ?? ''}}" class="card-img-top"
                                             alt="Default">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$product->name}}</h5>
                                            <div class="card-text"><h6>{{$product->brand->name}}</h6></div>
                                            <div class="card-text"><h5>{{$product->price}}$</h5></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
