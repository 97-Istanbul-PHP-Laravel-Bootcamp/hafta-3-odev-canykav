@extends('layout.admin')
@section('title','Satış Ekle/Düzenle');
@section('content_title','Satış Ekle/Düzenle')

@section('content')
@if(request()->success==1)
<div class="alert alert-success alert-dismissible show fade">
    Satış başarıyla düzenlendi.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="{{route('sale.update', $sale->id)}}">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Ürün</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" id="product_id" name="product_id" value="{{ $sale->product_id }}">
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->title}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label>Sipariş Numarası</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="orid" placeholder="Sipariş Numarası" value="{{$sale->orid}}">
                        </div>
                        <div class="col-md-4">
                            <label>Satış Numarası</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="code" placeholder="Satış Numarası" value="{{$sale->code}}">
                        </div>
                        <div class="col-md-4">
                            <label>Fiyat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="prc" placeholder="Fiyat" value="{{$sale->prc}}">
                        </div>
                        <div class="col-md-4">
                            <label>Satış Kuru</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="cid" value="{{$sale->cid}}">
                                    <option value="1">TL</option>
                                    <option value="2">Dolar</option>
                                    <option value="3">Euro</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label>Satış Tarihi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="date" class="form-control" name="sale_date" placeholder="Soyadı" value="{{$sale->sale_date}}">
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Kaydet</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
