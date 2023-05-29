@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                Categorias
            </h2>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">

            <a href="{{ route('category.create') }}" class="btn btn-info mb-2">Nova</a>

            <div class="card">
                <div class="table-responsive">
                    <table class="table" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Está ativa</th>
                                <th>Criada em</th>
                                <th>Alterada em</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->is_active }}</td>
                                    <td>{{ $category->created_at}}</td>
                                    <td>{{ $category->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('category.edit', ['category' => $category->id])}}" class="btn btn-sm btn-info">Editar</a>

                                        <form style="display: inline-block;" action="{{ route('category.destroy', ['category' => $category->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($categories->hasPages())
                    <div class="card-footer pb-0">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
