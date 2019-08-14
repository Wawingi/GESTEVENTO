<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Convidado;

class ConvidadoController extends Controller
{
    public function inserirConvidado(Request $request){
        $this->validate($request,[
            'nome'=>'required',
            'idAssento'=>'required',
        ]);
        $convidado = new Convidado;
        $convidado->nome = $request->nome;
        $convidado->genero = $request->genero;
        $convidado->estado = 'Ausente';
        $convidado->id_assento = $request->idAssento;
        $acompanhantes = $request->nome_acompanhante;
        $tamanho = count($acompanhantes);
        
        $idConvidado = DB::table('convidado')->insertGetId(
            ['nome' => $request->nome, 'genero' => $request->genero, 'estado' => 'Ausente', 'id_assento' => $request->idAssento]
        );
        if($idConvidado>0 && $acompanhantes[0]!=null){
            for($cont=0;$cont<$tamanho;$cont++){
                DB::table('acompanhante')->insert(
                    ['nome' => $acompanhantes[$cont], 'id_convidado' => $idConvidado]
                );
            }
            return redirect()->action(
                'AssentoController@ver', ['id' => $request->idAssento]
            )->with('info','Inserido com sucesso');
        }
        return redirect()->action(
            'AssentoController@ver', ['id' => $request->idAssento]
        )->with('info','Inserido com sucesso');

    }
}
