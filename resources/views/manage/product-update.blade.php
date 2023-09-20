@extends('master')

@section('title', 'Update Product')

@section('content')
    <div class="product-manage-create mt-4">
        <div class="row mb-4">
            <h2>Product Update</h2>
        </div>

        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="col-12">
                <form method="POST" action="{{route('update.product', ['id' => $product->id])}}"
                      enctype="multipart/form-data">
                    @csrf
                    @include("manage.product-fields", ['brands' => $brands, 'product' => $product])
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/manage" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
