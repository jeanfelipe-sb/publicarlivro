@extends('layouts.admin')

@section('content')
<h1 >Páginas</h1>
<a href="{{route('pages.create')}}" class="btn btn-primary">Adicionar Página</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TÍTULO</th>
            <th scope="col">SLUG</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
        <tr>
            <th scope="row">{{$page->id}}</th>
            <td>{{$page->titulo}}</td>
            <td>{{$page->slug}}</td>
            <td>                
                <a href="{{route('pages.show',$page->id)}}" class="actions view"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('pages.edit',$page->id)}}" class="actions edit"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $pages->links() !!}
@endsection
