@extends('layout.admin')
@section('title','Kategoriler');
@section('content_title','Kategoriler')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>URL</th>
                    <th>Durum</th>
                    <th width="106px">İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary" title="Düzenle">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form style="display:contents" method="post" action="{{route('category.destroy', $category->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary" title="Sil">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
