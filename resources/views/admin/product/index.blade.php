@extends('layout.admin')
@section('title','Ürünler');
@section('content_title','Ürünler')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Stok No</th>
                    <th>Başlık</th>
                    <th>Fiyat</th>
                    <th>Ekleyen</th>
                    <th>Durum</th>
                    <th width="106px">İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $products as $product)

                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>{{ $product->unicode }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->prc }}</td>
                    <td>{{ $product->user->uname }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary" title="Düzenle">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form style="display:contents" method="post" action="{{route('product.destroy', $product->id)}}">
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
