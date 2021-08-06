<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status', '<>', 't')->get();

        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Gelen form verilerinin dolu olup olmadığına bakar dolu ise aşağıdaki işlemi gerçekleştirir. Değil ise geriye döner aşağıdaki işlemleri gerçekleştirmeden.
        $request->validate([
            'catName' => 'required',
            'catDescription' => 'required'
        ]);

        $category = Category::create([
            'title' => $request->catName,
            'description' => $request->catDescription,
            'slug' => $request->catSeoAd,
            'status' => $request->catStatus
        ]);
        $category->save();

        return redirect()->route('admin.category.list');
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
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Gelen form verilerinin dolu olup olmadığına bakar dolu ise aşağıdaki işlemi gerçekleştirir. Değil ise geriye döner aşağıdaki işlemleri gerçekleştirmeden.
        $request->validate([
            'catName' => 'required',
            'catDescription' => 'required'
        ]);

        Category::where('id', $id)->update([
            'title' => $request->catName,
            'description' => $request->catDescription,
            'slug' => $request->catSeoAd,
            'status' => $request->catStatus
        ]);

        // Güncelleme uşlemi başarılı bir şekilde gerçekleştirildikten sonra geriye sesson oluşturarak sayfaya geri döner.
        return redirect()->back()->with('status', 'Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleştirildi...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->update([
            'status' => 't'
        ]);

        return redirect()->route('admin.category.list');
    }
}
