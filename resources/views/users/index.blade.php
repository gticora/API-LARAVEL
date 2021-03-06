@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h1 class="pb-1">{{ $title }}</h1>
                <p>
                    <a href="{{ route('users.crear_usuarios') }}" class="btn btn-dark">Nuevo Usuario</a>
                </p>
            </div>
            @if ($users->isNotEmpty())

            <div class="table-responsive-lg">
                <table class="table table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"># <span class="oi oi-caret-bottom"></span><span class="oi oi-caret-top"></span></th>
                        <th scope="col" class="sort-desc">Nombre <span class="oi oi-caret-bottom"></span><span class="oi oi-caret-top"></span></th>
                        <th scope="col">Empresa <span class="oi oi-caret-bottom"></span><span class="oi oi-caret-top"></span></th>
                        <th scope="col">Correo <span class="oi oi-caret-bottom"></span><span class="oi oi-caret-top"></span></th>
                        <th scope="col" class="text-right th-actions">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @each('users._row', $users, 'users')
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
    @else
        <p>No hay usuarios registrados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection

