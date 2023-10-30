@extends('layouts.app')

@section('content')
    <main class="d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <div class="card-header">
                <h1 class="card-title fs-4 p-2 m-0">Tareas de {{ Auth::user()->name }}</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('tarea.create') }}" class="btn btn-primary mb-3">Agregar Tarea</a>
                @if (Session::get('tareaCreada'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <div>Tarea creada exitosamente.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(Session::get('tareaActualizada'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <div>Tarea actualizada exitosamente.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(Session::get('tareaEliminada'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <div>Tarea eliminada exitosamente.</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Resuelta</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tareas as $tarea)
                            <tr>
                                <td>{{ $tarea->nombre }}</td>
                                <td>{{ $tarea->descripcion }}</td>
                                <td>
                                    @if ($tarea->resuelta == 1)
                                        <p class="text-success"><i class="fa-solid fa-check"></i></p>
                                    @else
                                        <p class="text-danger"><i class="fa-solid fa-x"></i></p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tarea.show', $tarea->id) }}" class="btn btn-warning text-white"><i
                                            class="fa-solid fa-circle-info"></i></a>
                                    <a href="{{ route('tarea.edit', $tarea->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('tarea.destroy', $tarea->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-button"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No existen tareas...</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    @vite(['resources/js/borrar_tarea.js'])
@endsection
