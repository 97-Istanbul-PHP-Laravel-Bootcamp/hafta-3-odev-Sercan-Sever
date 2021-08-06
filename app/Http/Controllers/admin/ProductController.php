<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', '<>', 't')->get();

        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', '=', 'a')->get(['id', 'title']);
        $users = User::where('status', '=', 'a')->get(['id', 'fname', 'lname']);
        return view('admin.product.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'prodName' => 'required',
            'prodSeo' => 'required',
            'prodOrder' => 'required',
            'prodNumber' => 'required',
            'prodRate' => 'required',
            'prodPrice' => 'required',
            'prodCategory' => 'required',
            'prodUser' => 'required',
            'prodStatus' => 'required'
        ]);

        $product =  Product::create([
            'category_id' => $request->prodCategory,
            'user_id' => $request->prodUser,
            'unicode' => $request->prodNumber,
            'slug' => $request->prodSeo,
            'title' => $request->prodName,
            'description' => $request->prodDescription,
            'order' => $request->prodOrder,
            'status' => $request->prodStatus,
            'prc' => $request->prodPrice,
            'cid' => $request->prodRate
        ]);

        $product->save();

        return redirect()->route('admin.product.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', '=', 'a')->get(['id', 'title']);
        $users = User::where('status', '=', 'a')->get(['id', 'fname', 'lname']);

        return view('admin.product.edit', compact('product', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // Gelen form verilerinin dolu olup olmadığına bakar dolu ise aşağıdaki işlemi gerçekleştirir. Değil ise geriye döner aşağıdaki işlemleri gerçekleştirmeden.
        $request->validate([
            'prodName' => 'required',
            'prodSeo' => 'required',
            'prodOrder' => 'required',
            'prodNumber' => 'required',
            'prodRate' => 'required',
            'prodPrice' => 'required',
            'prodCategory' => 'required',
            'prodUser' => 'required',
            'prodStatus' => 'required'
        ]);

        Product::where('id', $id)->update([
            'category_id' => $request->prodCategory,
            'user_id' => $request->prodUser,
            'unicode' => $request->prodNumber,
            'slug' => $request->prodSeo,
            'title' => $request->prodName,
            'description' => $request->prodDescription,
            'order' => $request->prodOrder,
            'status' => $request->prodStatus,
            'prc' => $request->prodPrice,
            'cid' => $request->prodRate
        ]);


        return redirect()->route('admin.product.edit', ['id' => $id])->with('status', 'Güncelleme İşleminiz Başarılı Bir Şekilde Gerçekleştirilmiştir...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        Product::where('id' , $id)->update([
            'status' => 't'
        ]);

        return redirect()->back();
    }
}
