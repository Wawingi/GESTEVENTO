<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Evento;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use PDF;

class EventoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        return view('home');
    }

    public function listar()
    {
        $d['eventos'] = Evento::paginate(30);
        return view('listarevento',$d);
    }

    /*public function listar()
    {
        $eventos = Evento::paginate(3);
        return view('listarevento',compact('eventos'));
    }*/

    public function inserir(Request $request){
        /*$this->validate($request,[
            'tipo'=>'required',
            'entidade'=>'required',
            'local'=>'required',
            'data'=>'required',
            'hora'=>'required',
        ]);
        $evento = new Evento();
        $evento->tipo = $request->input('tipo');
        $evento->entidade = $request->input('entidade');
        $evento->local = $request->input('local');
        $evento->data = $request->input('data');
        $evento->hora = $request->input('hora');
        $evento->save();

        return redirect('/listar')->with('info','Inserido com Sucessso');
       
        */

        $evento = new Evento;
        $evento->tipo = $request->tipo;
        $evento->entidade = $request->entidade;
        $evento->local = $request->local;
        $evento->data = $request->data;
        $evento->hora = $request->hora;
        $evento->save();
        
        return response()->json($evento);
    }

    
    public function editar($id){
        $evento = Evento::find($id);
        return view('actualizar',compact('evento'));
    }

    //AJAX EDIT
    public function editarEvento(Request $request){
        $evento = Evento::find($request->id);
        $evento->tipo = $request->tipo;
        $evento->entidade = $request->entidade;
        $evento->local = $request->local;
        $evento->data = $request->data;
        $evento->hora = $request->hora;
        $evento->save();
        return response()->json($evento);
    }

    //AJAX DELETE 
    public function apagarEvento(Request $request){
        $evento = Evento::find ($request->id)->delete();
        //return response()->json();
    }

    public function actualizar(Request $request,$id){
        $this->validate($request,[
            'tipo'=>'required',
            'entidade'=>'required',
            'local'=>'required',
            'data'=>'required',
            'hora'=>'required',
        ]);

        $dados = array(
            'tipo' => $request->input('tipo'),
            'entidade' => $request->input('entidade'),
            'local' => $request->input('local'),
            'data' => $request->input('data'),
            'hora' => $request->input('hora'),
        );
        Evento::where('id', $id)->update($dados);
       
        return redirect('/listar')->with('info','Evento actualizado com Sucessso');
    }

    
    public function eliminar($id) {
        Evento::where('id', $id)->delete();
       
        return redirect('/listar')->with('info','Evento eliminado com Sucessso');    
    }


    public function ver($id){
        $evento = Evento::find($id);
        return view('verevento',compact('evento'));
    }

    public function verPDF($id){
        $evento = Evento::find($id)->get();
        $convidados = DB::select('select c.id,c.nome,a.designacao from convidado c,assento a where c.id_assento=a.id AND a.id_evento = :id_evento ORDER BY designacao',['id_evento' => $id]);
        $pdf = PDF::loadView('pdfevento',compact('evento','convidados'));
        return $pdf->setPaper('a4')->stream('pdfevento');
    }

}
