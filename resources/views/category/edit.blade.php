@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                Editar Categoria #{{ $category->id }}
            </h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div class="alert-title">{{$error}}</div>
                @endforeach
            </div>
        @endif
    </div>


    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ $category->title }}"/>
                </div>

                <div class="form-group mt-2">
                    <label class="form-label">Está ativa</label>
                    <select class="form-control" name="is_active">
                        <option value="1">Sim</option>
                        <option value="0" @if($category->is_active == 0) selected @endif >Não</option>
                    </select>
                </div>

                <input class="btn btn-info mt-2" type="submit" value="Salvar"/>
            </form>
        </div>
    </div>
@endsection
