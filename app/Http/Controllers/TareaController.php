<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequest;
use App\Models\Tarea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TareaController extends Controller
{
    
    public function index()
    {
        if(Auth::check()) {
            $tareas = Tarea::where('user_id', Auth::id())->orderBy('resuelta')->get();
            return view('tarea.index', compact('tareas'));
        } else {
            return redirect('login');
        }
        //
    }
    public function create(): View
    {
        return view('tarea.create');
    }

    public function store(TareaRequest $request)
    {
        if(Auth::check()) {
            Tarea::create([
                "nombre" => $request->nombre,
                "descripcion" => $request->descripcion,
                "resuelta" => false,
                "user_id" => Auth::id()
            ]);
            return redirect()->route('tarea.index')->with('tareaCreada', true);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea): View
    {
        return view('tarea.show', compact('tarea'));
    }

    public function edit(Tarea $tarea): View
    {
        return view('tarea.edit', compact('tarea'));
    }

    public function update(TareaRequest $request, Tarea $tarea): RedirectResponse
    {
        
        $tarea->update([
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "resuelta" => ($request->resuelta == 1)
        ]);
        return redirect()->route('tarea.index')->with('tareaActualizada', true);
    }

    public function destroy(Tarea $tarea): RedirectResponse
    {
        $tarea->delete();
        return redirect()->route('tarea.index')->with('tareaEliminada', true);
    }
}
