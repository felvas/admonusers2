<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DynamicDependent extends Controller
{
    function index()
    {
     $departamentos_list = DB::table('departamentos')->get();
     return view('process.create')->with('departamentos_list', $departamentos_list);
    }
    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('municipios')
       ->where('departamento_id', $value)->get();
      $output='';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id_municipio.'">'.$row->municipio.'</option>';
     }
     echo $output;
    }
    function getNameDepto($id)
    {
      $data = DB::table('departamentos')
       ->where('id_departamento', $id)->get();
      echo $data[0]->departamento;
    }
    function getNameMun($id){
     $data = DB::table('municipios')
       ->where('id_municipio', $id)->get();
      echo $data[0]->municipio;
    }
}
