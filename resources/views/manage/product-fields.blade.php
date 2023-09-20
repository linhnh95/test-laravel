@if ($errors->any())
    @foreach( $errors->all() as $message )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <p class="mb-0">
                {{ $message }}
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

<div class="mb-3">
    <label for="productBrand" class="form-label">Product Brand</label>
    <select name="brand_id" id="productBrand" class="form-control">
        <option value="">--- Select ---</option>
        @foreach($brands as $brand)
            <option value="{{$brand->id}}" @if(isset($product) && $product->brand_id == $brand->id) selected @endif>{{$brand->name}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <div id="preview-image">
        @if(isset($product) && $product->images->isNotEmpty())
            @foreach($product->images as $image)
                <div class="preview-image-item">
                    <img src="{{$image->link}}" alt="Vodaplay">
                </div>
            @endforeach
        @endif
    </div>
    <label for="productImage" class="form-label">Product Images</label>
    <input id="upload-images" name="images[]" type="file" multiple class="form-control" accept=".png, .jpg, .jpeg, .gif"/>
</div>
<div class="mb-3">
    <label for="productName" class="form-label">Product Name</label>
    <input type="text" class="form-control" @if(isset($product)) value="{{$product->name}}" @endif name="name" id="productName">
</div>
<div class="mb-3">
    <label for="productPrice" class="form-label">Product Price</label>
    <input type="number" class="form-control" @if(isset($product)) value="{{$product->price}}" @endif name="price" id="productPrice">
</div>
<div class="mb-3">
    <label for="productPrice" class="form-label">Product Description</label>
    <textarea class="form-control" name="description">@if(isset($product)){{$product->description}}@endif</textarea>
</div>
