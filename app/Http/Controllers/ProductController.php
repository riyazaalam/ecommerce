<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
				$edit = '<a href="/admin/products/'.$product->id.'/edit" style="" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>';
				return $edit;
			})

            // 'name',
            // 'price',
            // 'main_image',
            

			->addIndexColumn()
			->rawColumns(['name','price','main_image','action'])->setRowId('id')->make(true);
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
        //
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
}
