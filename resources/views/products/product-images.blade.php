<div class="card">
    <div class="card-body">
        <figure class="figure w-100">
            <img id="image-figure" src="{{$mainImage->link}}" class="figure-img w-100 img-fluid rounded" alt="Default">
        </figure>
        <div class="row text-center text-lg-start">

            @foreach($thumbnails as $thumbnail)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="javascript:;" class="d-block mb-4 h-100">
                        <img class="image-thumbnail img-fluid img-thumbnail" src="{{$thumbnail->link}}" alt="Default">
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>
