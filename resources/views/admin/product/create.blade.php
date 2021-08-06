@extends('layout.admin')
@section('title','Ürün Ekle/Düzenle');
@section('content_title','Ürün Ekle/Düzenle')

@section('content')

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="{{route('product.store')}}">
                <div class="form-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>Ürün Kodu</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="unicode" placeholder="Ürün Kodu">
                        </div>
                        <div class="col-md-4">
                            <label>Başlık</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="title" placeholder="Başlık">
                        </div>
                        <div class="col-md-4">
                            <label>Açıklama</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="description" placeholder="Açıklama">
                        </div>
                        <div class="col-md-4">
                            <label>Sıra</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="order" placeholder="Sıra">
                        </div>
                        <div class="col-md-4">
                            <label>Fiyat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="prc" placeholder="Fiyat">
                        </div>
                        <div class="col-md-4">
                            <label>Satış kuru</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="cid">
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
                                <select class="form-select" name="category_id">
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
