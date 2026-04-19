<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.product.index');
    }

     public function data(request $request){
		$query = Product::where('id','!=',0)->with('images')->orderBy('id','DESC');

      	return DataTables::eloquent($query)
			->editColumn('name', function ($product) {
                return ucwords($product->name);
            })

            ->editColumn('price', function ($product) {
                return '₹ ' . number_format($product->price, 2);
            })
            ->addColumn('main_image', function ($product) {
                if (!empty($product->main_image_url)) {
                    return '<img src="'.$product->main_image_url.'" width="50" height="50" style="object-fit:cover;border-radius:5px;">';
                }
                return '<span class="text-muted">No Image</span>';
            })
			->addColumn('action', function ($product) {
				$edit = '<a href="/admin/products/'.$product->id.'/edit" style="" class="btn btn-sm btn-warning" title="Edit"><i class="ft-edit"></i></a>';
				return $edit;
			})
            ->editColumn('view_images', function ($product) {
                return '<a class="btn btn-sm btn-info view-entity-btn" data-entity="products" data-entity-id="'.$product->id.'" data-label="Product Id  ('.$product->id.')" title="View Images" ><i class="fa fa-image""></i></a>';

            })
			->addIndexColumn()
			->rawColumns(['name','price','main_image','view_images','action'])->setRowId('id')->make(true);
   	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->rules, $this->customMessages);
		$product = new Product;
		$product->fill($request->all());
        if($request->hasFile('main_image')){
            $product->main_image =  Storage::disk('public')->put('main_image', $request->main_image);
        }
		$product->save();

        // Upload multiple images
        if ($request->hasFile('other_images') && !empty($request->file('other_images'))) {
            $images = array_filter($request->file('other_images'));
            foreach ($images as $image) {
                Storage::disk('public')->put('main_image', $request->main_image);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => Storage::disk('public')->put('other_images', $image)
                ]);
            }
        }

		return response()->json(['status' => 'success','message' => 'Product Created Successfully', 'id' => $product->id, 'label' => $product->name],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function viewModal($id){
        $product =Product::find($id);
        $productImages = ProductImage::where('product_id',$product->id)->get();
		return view("admin.product.onlyView",compact('product','productImages'));
	}


    private $rules = [
        'name'        => 'required|max:255',
        'price'       => 'required|numeric|min:0',
        'main_image' => 'required|image|max:2048',
    ];
	private $customMessages = [
        'name.required'       => 'Please enter Product Name',
        'name.max'            => 'Product Name should not be more than 255 characters',

        'price.required'      => 'Please enter Price',
        'price.numeric'       => 'Price must be a number',
        'price.min'           => 'Price must be greater than 0',

        'main_image.required' => 'Please upload Main Image',
        'main_image.image'    => 'File must be an image',
        'main_image.mimes'    => 'Only jpeg, png, jpg allowed',
        'main_image.max'      => 'Image size must be less than 2MB',
    ];
}
