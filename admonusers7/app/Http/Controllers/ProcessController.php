<?php

namespace App\Http\Controllers;

use App\ProcessModel;
use App\Http\Requests\ProcessRequest;
use Illuminate\Support\Facades\Hash;
use DB;

class ProcessController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProcessModel $model)
    {
        
        return view('process.index', ['process' => $model->paginate(15)]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('process.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessRequest $request, ProcessModel $model)
    {
        $model->create([
            'process_id' => $request['process_id'],
            'process_name' => $request['process_name'],
            'description' => $request['description'],
            'departamento' => $request['departamento'],
            'municipio' => $request['municipio'],
            'fecha_inicio' => null,
            'feche_fin' => null,
            'url_docs' => $request['municipio'],
            'status' => $request['municipio'],
            'confirmed' => $request['municipio'],
        ]);

        return redirect()->route('proces.index')->withStatus(__('Proceso creado con exíto.'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProcessModel  $processModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcessModel $processModel)
    {
        return view('process.edit', compact('proces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProcessModel  $processModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcessModel $processModel)
    {
        $processModel->update();

        return redirect()->route('process.index')->withStatus(__('proceso actualizado con Exito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProcessModel  $processModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcessModel $processModel)
    {
        $processModel->delete();

        return redirect()->route('proces.index')->withStatus(__('Proceso Eliminado.'));
    }
}
