@extends('layouts.app')

@section('content')
    <main class="d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <div class="card-header">
                <h1 class="card-title fs-4 p-2 m-0">Agregar Tarea</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('tarea.update', $tarea->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') border-danger @enderror" id="nombre" name="nombre" value="{{ $tarea->nombre }}" required>
                        @error('nombre')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control @error('descripcion') border-danger @enderror" id="descripcion" rows="5" name="descripcion" style="resize: none" required>{{ $tarea->descripcion }}</textarea>
                        @error('descripcion')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="resuelta" name="resuelta" value="1" @checked($tarea->resuelta)>
                        <label class="form-check-label" for="resuelta">Resuelta</label>
                      </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Modificar</button>
                        <a href="{{ route('tarea.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
