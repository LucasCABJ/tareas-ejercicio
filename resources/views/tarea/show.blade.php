@extends('layouts.app')

@section('content')
    <main class="d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <div class="card-header">
                <h1 class="card-title fs-4 p-2 m-0">{{ $tarea->nombre }}</h1>
            </div>
            <div class="card-body">
                @if ($tarea->resuelta == 1)
                    <p class="text-success fs-4">Resuelta</p>
                @else
                    <p class="text-warning fs-4">Pendiente</p>
                @endif
                <p class="fs-4">- {{ $tarea->descripcion }}</p>
                <a href="{{ route('tarea.index') }}" class="btn btn-secondary">Volver atrás</a>
            </div>
        </div>
    </main>
@endsection
