@extends('layout.admin')
@section('title','Kullanıcı Ekle/Düzenle');
@section('content_title','Kullanıcı Ekle/Düzenle')

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" action="{{route('user.update',$user->id)}}">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Kullanıcı Adı</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="uname" placeholder="Kullanıcı Adı" value="{{ $user->uname }}">
                        </div>
                        <div class="col-md-4">
                            <label>Şifre</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="pass" placeholder="Şifre" value="{{ $user->pass }}">
                        </div>
                        <div class="col-md-4">
                            <label>Adı</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="fname" placeholder="Adı" value="{{ $user->fname }}">
                        </div>
                        <div class="col-md-4">
                            <label>Soyadı</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="lname" placeholder="Soyadı" value="{{ $user->lname }}">
                        </div>
                        <div class="col-md-4">
                            <label>E-Mail</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="mail" class="form-control" name="mail" placeholder="E-Mail" value="{{ $user->mail }}">
                        </div>
                        <div class="col-md-4">
                            <label>Telefon</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="mpno" placeholder="Telefon" value="{{ $user->mpno }}">
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
