@extends('layout.admin')
@section('title','Kategori Ekle');
@section('content_title','Kategori Ekle')

@section('content')

@if(request()->success==1)
<div class="alert alert-success alert-dismissible show fade">
    Kategori başarıyla eklendi.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="{{route('category.store')}}">
                <div class="form-body">
                        @csrf
                    <div class="row">
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
                            <label>URL Adresi (isteğe bağlı)</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="slug" placeholder="URL Adresi (isteğe bağlı)">
                        </div>
                        <div class="col-md-4">
                            <label>Durum</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="status">
                                    <option value="active">Aktif</option>
                                    <option value="passive">Pasif</option>
                                    <option value="trash">Çöp</option>
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
