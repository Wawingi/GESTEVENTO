<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Convidado;

class ConvidadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gerarQRCODE($id,$nome){
        
        $novonome=Str_replace(' ','_',$nome);

        $file=public_path('images/qrcodes/'.$novonome.'.png');
        return \QRCode::text($id)->setOutfile($file)->setSize(5)->png();   
    }
    
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
        
        
        $idConvidado = DB::table('convidado')->insertGetId(
            ['nome' => $request->nome, 'genero' => $request->genero, 'estado' => 'Ausente', 'id_assento' => $request->idAssento]
        );
        //Chamar o método que gerá o QR do convidado inserido
        $this->gerarQRCODE($idConvidado,$request->nome);

        //entrar neste método se o convidado possuir acompanhante
        if($idConvidado>0 && $acompanhantes[0]!=null){
            for($cont=0;$cont<count($acompanhantes);$cont++){
                DB::table('acompanhante')->insert(
                    ['nome' => $acompanhantes[$cont], 'id_convidado' => $idConvidado]
                );
            }
             //Chamar o método que gerá o QR do convidado inserido
            $this->gerarQRCODE($idConvidado,$request->nome);
            return redirect()->action(
                'AssentoController@ver', ['id' => $request->idAssento]
            )->with('info','Inserido com sucesso');
        }
        return redirect()->action(
            'AssentoController@ver', ['id' => $request->idAssento]
        )->with('info','Inserido com sucesso');
    }

    public function verQRCODE($nome){
        $novonome=Str_replace(' ','_',$nome);
        return view('verqrcode',compact('novonome'));
    }
	
	public function eliminar(Request $request){
		$convidados = $request->convidados;
		if($convidados){
			foreach($convidados as $convidado){
				DB::table('convidado')->where('id',$convidado)->delete();
			}
			return back()->with('info','Eliminado com sucesso');
		}else{
			return back();
		}
	}
   
}