<style>
.view-data {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

/* Label */
.label {
    width: 100%;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Image box */
.image-box {
    width: 150px;
    height: 150px;
    border: 2px dashed #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    background: #f9f9f9;
}

/* Main image bigger */
.main-image {
    width: 200px;
    height: 200px;
    border: 2px solid #000;
}

/* Image */
.image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Delete icon */
.delete-icon {
    position: absolute;
    top:0px;
    right:0px;
    background: red;
    color: #fff;
    width: 20px;
    height: 20px;
    font-size: 14px;
    text-align: center;
    line-height: 20px;
    border-radius: 50%;
    cursor: pointer;
}

/* Upload box */
.upload-box {
    cursor: pointer;
    background: #f9f9f9;
}

.upload-box i {
    font-size: 30px;
    color: #888;
}
</style>

@if(isset($message))
    <div class="alert alert-info">
        {{ $message }}
    </div>
@endif
<div class="view-data">

    <!-- 🔥 MAIN IMAGE -->
    <div class="label">Main Image</div>
    <div class="image-box">
        <img src="{{ $product->main_image_url }}" alt="Main Image">
    </div>

    <!-- 🔥 OTHER IMAGES -->
    @foreach($productImages as $img)
        <div class="image-box">

            <!-- ❌ DELETE ICON -->
            <span class="delete-icon productImageDelete" data-product_id="{{ $product->id }}"  data-id="{{ $img->id }}">×</span>

            <img src="{{ $img->image_url }}" alt="">
        </div>
    @endforeach

    <form action="{{ route('admin.products.uploadProductImage') }}" method="POST" enctype="multipart/form-data" id="productImageUpload-form">
        @csrf
        <!-- 🔥 UPLOAD BOX -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label class="image-box upload-box">
            <i class="fa fa-plus"></i>
            <input type="file" name="other_images[]" accept="image/*"  multiple hidden>
        </label>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary mt-3" id="uploadBtn">
            <span class="btn-text">Upload Images</span>
            <!-- Loader (hidden by default) -->
            <span class="spinner-border spinner-border-sm d-none" id="uploadLoader"></span>
        </button>
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

</script>


