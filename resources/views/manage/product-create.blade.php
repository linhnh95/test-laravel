@extends('master')

@section('title', 'Create Product')

@section('content')
    <div class="product-manage-create mt-4">
        <div class="row mb-4">
            <h2>Product Create</h2>
        </div>

        <div class="row">

            <div class="col-12">
                <form method="POST" action="{{route('create.product')}}" enctype="multipart/form-data">
                    @csrf
                    @include("manage.product-fields", ['brands' => $brands])
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/manage" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
