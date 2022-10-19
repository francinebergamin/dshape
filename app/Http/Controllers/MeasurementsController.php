<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurements;


class MeasurementsController extends Controller
{
  public function index(){
    $measurements = Measurements::all();
    return view('/measurements/list',
           ['measurements' => $measurements]);
  }

  public function store(Request $request){
    //criando o objeto Medidas
    $measurements = new Measurements();

    //alterando os atributos do objeto
    $measurements->date = $request->date;
    $measurements->weight = $request->weight;
    $measurements->height = $request->height;
    $measurements->chest = $request->chest;
    $measurements->left_arm = $request->left_arm;
    $measurements->right_arm = $request->right_arm;
    $measurements->abdomen = $request->abdomen;
    $measurements->waist = $request->waist;
    $measurements->hips = $request->hips;
    $measurements->left_thigh = $request->left_thigh;
    $measurements->right_thigh = $request->right_thigh;
    $measurements->left_calf = $request->left_calf;
    $measurements->right_calf = $request->right_calf;

    //Encaminhar para salvar no banco de dados
    $measurements->save();

    //Redirecionar para a página que lista as medidas
    return redirect('/measurements');
  }

  public function destroy($id){

    //Retornar a medida do banco de dados
    $measurement = Measurements::findOrFail($id);

    //excluir a medida do banco de dados
    $measurement->delete();

    //Redirecionar para a página que
    //lista as medidas
    return redirect('/measurements');

  }//fim do destroy

  public function update(Request $request, $id){

    // Buscar pela medida que será alterada
    $measurement = Measurements::findOrFail($id);

    // Realizar as alterações
    $measurement->date = $request->date;
    $measurement->weight = $request->weight;
    $measurement->height = $request->height;
    $measurement->chest = $request->chest;
    $measurement->left_arm = $request->left_arm;
    $measurement->right_arm = $request->right_arm;
    $measurement->abdomen = $request->abdomen;
    $measurement->waist = $request->waist;
    $measurement->hips = $request->hips;
    $measurement->left_thigh = $request->left_thigh;
    $measurement->right_thigh = $request->right_thigh;
    $measurement->left_calf = $request->left_calf;
    $measurement->right_calf = $request->right_calf;

    // Salvar as alterações no BD(UPDATE)
    $measurement->update();

    //Redirecionar para a página que
    //lista as medidas
    return redirect('/measurements');

  }//fim do update

  public function show($id){
    //Buscar pela medida
    $measurement = Measurements::findOrFail($id);

    //retorna a view com a medida encontrada
    return view('/measurements/form',
                ['measurement' => $measurement]);

  }//fim do show

}//fim da classe
