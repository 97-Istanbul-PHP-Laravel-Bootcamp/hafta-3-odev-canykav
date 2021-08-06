@extends('layout.admin')
@section('title','Ürün Ekle/Düzenle');
@section('content_title','Ürün Ekle/Düzenle')

@section('content')

@if(request()->success==1)
<div class="alert alert-success alert-dismissible show fade">
    Ürün başarıyla düzenlendi.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="{{route('product.update', $product->id)}}">
                <div class="form-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <label>Ürün Kodu</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="unicode" placeholder="Ürün Kodu" value="{{ $product->unicode }}">
                        </div>
                        <div class="col-md-4">
                            <label>Başlık</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="title" placeholder="Başlık" value="{{ $product->title }}">
                        </div>
                        <div class="col-md-4">
                            <label>Açıklama</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="description" placeholder="Açıklama" value="{{ $product->description }}">
                        </div>
                        <div class="col-md-4">
                            <label>Sıra</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="order" placeholder="Sıra" value="{{ $product->order }}">
                        </div>
                        <div class="col-md-4">
                            <label>Fiyat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="prc" placeholder="Fiyat" value="{{ $product->prc }}">
                        </div>
                        <div class="col-md-4">
                            <label>Satış kuru</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="cid" value="{{ $product->cid }}">
                                    <option value="1">TL</option>
                                    <option value="2">Dolar</option>
                                    <option value="3">Euro</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label>Kategori</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="category_id" value="{{ $product->category_id }}">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
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
