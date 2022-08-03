@extends('template.index')
@section('title', 'Painel de controle')
@section('content')



<div class="mt-5 pt-5">
    <div class="container pt-5">

        <h3>Olá, {{ Auth::user()->name }} </h3>

        <hr>

        <div class="container mt-5 d-flex justify-content-center">
            <a class="btn btn-primary me-3 px-4" href="{{route('users.list')}}">Listar usuários</a>
            <a class="btn btn-primary me-3 px-4" href="/admin/orders">Listar pedidos</a>
            <a class="btn btn-primary ms-3" href="/account/{{ Auth::user()->id }}">Suas informações</a>
        </div>


    </div>
</div>


<div class="container-main pt-5">

    <div class="container mt-5">
        <h1 class="text-center">Lista de usuários</h1>
        <hr>
        <table class="table table-hover table-danger table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Última atualização</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d/m/Y - H:i:s', strtotime($user->created_at)) }}</td>
                    <td>{{ date('d/m/Y - H:i:s', strtotime($user->updated_at)) }}</td>
                    <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary text-dark">Visualizar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



@endsection
