@extends('layouts.admin')
@section('content')
   <div class="row">
    <div class="col-12">
        <div class="content-header">Products</div>
    </div>
</div>
<section id="basic-input">
    <div class="row">
        <div class="col-12">
            <form id="product-form" method="post" action="{{ Route::is('admin.products.create') ? route('admin.products.store') : route('admin.products.update', ['product' => $product->route_key]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                {{ Route::is('admin.products.create') ? '' : method_field('PUT') }}
                <div class="card">
                    <div class="card-header tcul-gradient-1 pb-2 pt-2 header-color">
                        <h4 class="card-title text-light">{{ Route::is('admin.products.create') ? 'Add Product here' : 'Edit Product here' }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Name <sup class="tcul-star-restrict">*</sup></label>
                                    <input type="text" name="name" class="form-control
                                    " id="product-name" value="{{ isset($product) ? $product->name : old('name') }}" placeholder="Enter Product Name">
                                    <div id="product-name-error" style="color:red"></div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Price <sup class="tcul-star-restrict">*</sup></label>
                                    <input type="text" name="price" class="form-control
                                    " id="product-price" value="{{ isset($product) ? $product->price : old('price') }}" placeholder="Enter Product Price"  onkeypress="if(this.value.length==10) return false;"
                                    oninput="this.value=this.value
                                        .replace(/[^0-9.]/g,'')
                                        .replace(/(\..*)\./g, '$1');">
                                    <div id="product-price-error" style="color:red"></div>
                                </fieldset>
                            </div>
                            <div class="col-md-6 mt-3">
                                <fieldset class="form-group">
                                    <label for="basicInput">Main Image <sup class="tcul-star-restrict">*</sup></label>
                                    <input type="file" class="form-control-file"  name="main_image" id="product-main_image" placeholder="Main Image">
                                    <div id="product-main_image-error" style="color:red"></div>
                                </fieldset>
                            </div>
                            @if(Route::is('admin.products.create'))
                            <div class="col-md-6 mt-3">
                                <fieldset class="form-group">
                                    <label for="basicInput">Other Images<sup class="tcul-star-restrict"></sup></label>
                                      <input type="file" 
                                        class="form-control-file" 
                                        name="other_images[]" 
                                        id="product-other_images" 
                                        multiple>
                                    <div id="product-other_images-error" style="color:red"></div>
                                </fieldset>
                            </div>
                            @endif

                            @if(isset($product) && !empty($product))
                             <div class="col-md-6">
                                <fieldset class="form-group">
                                    @php
                                        $imagePath = (!empty($product->main_image_url))
                                                    ? $product->main_image_url
                                                    : asset('no-image.png'); // default image
                                    @endphp
                                     <img src="{{ $imagePath }}" 
                                    alt="Product Image" 
                                    style="width:150px;height:150px;border:1px solid #ddd;padding:5px;">
                                </fieldset>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2"><i class="ft-check-square mr-1"></i> Save</button>
                        <a href="/admin/products" type="button" class="btn btn-secondary" id="product_cancel"><i class="ft-x mr-1"></i>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    /* Form Submit */
    $('#product-form').submit(function(e) {
        $('div[id$="-error"]').empty();
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                if (data.status === 'success') {
                    toastr.success(data.message);

                    setTimeout(function () {
                        window.location.href = "{{ route('admin.products.index') }}";
                    }, 500);

                } else {
                    toastr.error(data.message || 'Something went wrong');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(xhr.responseJSON.message,'');
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#product-'+key+'-error').html(value);
                });

                $('html, body').animate({
                    scrollTop: $('#'+Object.keys(xhr.responseJSON.errors)[0]+'-error').offset().top - 200
                }, 500);
            }
        });
    });
</script>
@endsection

