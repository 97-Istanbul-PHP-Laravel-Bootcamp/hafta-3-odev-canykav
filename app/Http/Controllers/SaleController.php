<?php

namespace App\Http\Controllers;

use App\Models\sale;
use Illuminate\Http\Request;
use App\Models\product;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = sale::all();
        return view('admin.sale.index')->with(compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        return view('admin.sale.create')->with(compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = 1; // auth olmadığı için user_id çekemiyorum. hata almamamak için 1 verip geçtim
        sale::create($request->all());
        return redirect()->route('sale.create', ['success' => '1']);
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
        $products = product::all();
        $sale = sale::find($id);
        return view('admin.sale.edit')->with(compact('sale','products'));
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
        sale::find($id)->update($request->all());
        return redirect()->route('sale.edit', [$id, 'success' => '1']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sale::find($id)->delete();
        return redirect()->route('sale.index');
    }
}
