@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h1 class="pb-1">{{ $title }}</h1>
                <p>
                </p>
            </div>
            <div class="table-responsive-lg">
                <form method="POST" action="{{ url('create') }}">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese Nombre" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese DNI" value="{{ old('dni') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="correo@correo.com" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mayor a 6 caracteres">
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Crear usuario</button>
                        <a href="{{ route('users.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
    @parent
@endsection

