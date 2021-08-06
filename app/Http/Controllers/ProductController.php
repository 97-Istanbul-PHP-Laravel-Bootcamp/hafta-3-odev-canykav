<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::has('category')->has('user')->get();
        return view('admin.product.index')->with(compact('products'));
    }

    public function create()
    {
        $categories = category::all();
        return view('admin.product.create')->with(compact('categories'));
    }


    public function sef($s) { // slug(link) yapısı için fonsiyon
        $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
        $eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
        $s = str_replace($tr,$eng,$s);
        $s = strtolower($s);
        $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = trim($s, '-');
       return $s;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = 1; // henüz auth sistemi yazmadığım için ürünü ekleyeni auth'tan alamıyorum. 1 verdim geçtim.
        $request['slug'] = '/' . (product::latest()->first()->id+1) . '-' . $this->sef($request->title); // id-başlık şeklinde link yapısı
        $request['status'] = 'active';
        product::create($request->all());
        return redirect()->route('product.create', ['success' => '1']);
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
        $product = product::find($id);
        $categories = category::all();
        return view('admin.product.edit')->with(compact('product','categories'));
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
        product::find($id)->update($request->all());
        return redirect()->route('product.edit', [$id, 'success' => '1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::find($id)->update([
            'status' => 'trash'
        ]);
        return redirect()->route('product.index');
    }
}
