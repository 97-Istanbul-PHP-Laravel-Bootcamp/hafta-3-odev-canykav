@extends('layout.admin')
@section('title','Kullanıcılar');
@section('content_title','Kullanıcılar')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kullanıcı Adı</th>
                    <th>E-Mail</th>
                    <th>Telefon</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Durum</th>
                    <th>Oluşturulma Tarihi</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->uname }}</td>
                    <td>{{ $user->mail }}</td>
                    <td>{{ $user->mpno }}</td>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $user->lname }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary" title="Düzenle">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form style="display:contents" method="post" action="{{route('user.destroy', $user->id)}}">
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
