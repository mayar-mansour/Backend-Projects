<?php

namespace App\Http\Controllers;
// define model
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /** Display a listing of the resource */
    public function index()
    {
       //send datat to the index view page
        // $products = Product::all();
        $products = Product::latest()->paginate(5);
// get the top 5 of all products, ordered by the id of products in descending order. 
// the $i will act as starting row number of each page on the grid.
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /** Show the form for creating a new resource*/
    public function create()
    {
        return view('products.create');
    }

    /** Store a newly created resource in storage.  */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|max:30',
            'detail' => 'required|max:1500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // // 1-post create for each input ,then stored into input variable and request all
        $input = $request->all();
        // 1-function for store image request 
        // if their is a file named image
        if ($image = $request->file('image')) {
            // new image path
            $destinationPath = 'image/';
            // change the image name by the name related to date 
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            // get your data from profileImage
            $input['image'] = "$profileImage";
        }

        Product::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /** Display the specified resource*/
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /** Show the form for editing the specified resource */
    public function edit(Product $product)
    {
        // The compact() function creates an array from variables and 
        // their values. Note: Any strings that does not match variable names will be skipped.
        return view('products.edit', compact('product'));
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $product->update($input);
// redirect to index page with message
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /** Remove the specified resource from storage. */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
