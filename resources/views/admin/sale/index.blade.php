@extends('layout.admin')
@section('title','Satışlar');
@section('content_title','Satışlar')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kullanıcı</th>
                    <th>Sipariş No.</th>
                    <th>Ürün No.</th>
                    <th>Satış No.</th>
                    <th>Fiyat</th>
                    <th>Satış kuru</th>
                    <th>Satış Tarihi</th>
                    <th>Oluşturulma Tarihi</th>
                    <th>Güncelleme Tarihi</th>
                    <th width="106px">İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->user_id }}</td>
                    <td>{{ $sale->orid }}</td>
                    <td>{{ $sale->product_id}}</td>
                    <td>{{ $sale->code }}</td>
                    <td>{{ $sale->prc }}</td>
                    <td>{{ $sale->cid }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->updated_at }}</td>
                    <td>
                        <a href="{{route('sale.edit', $sale->id)}}" class="btn btn-primary" title="Düzenle">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form style="display:contents" method="post" action="{{route('sale.destroy', $sale->id)}}">
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
