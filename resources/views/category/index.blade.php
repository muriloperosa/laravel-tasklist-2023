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

                                        <form class="form-delete" style="display: inline-block;" action="{{ route('category.destroy', ['category' => $category->id])}}" method="POST">
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

    <script>
        // Selecione todos os formulários com a classe "form-delete"
        const formDeleteList = document.querySelectorAll('.form-delete');

        // Itere sobre cada formulário e atribua o evento de clique
        formDeleteList.forEach(function(formDelete) {

            // Adicione o listener para o evento de 'submit'
            formDelete.addEventListener('submit', function(event) {

                // Bloqueio o envio do formulário até que o usuário confirme a ação
                event.preventDefault();

                // Exiba o modal de confirmação
                const shouldProceed = confirm('Tem certeza de que deseja excluir?');

                // Caso confirmado prossiga com a deleção
                if (shouldProceed) {
                    formDelete.submit();
                }
            });
        });
    </script>
@endsection
