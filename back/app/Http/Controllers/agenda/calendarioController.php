<?php

namespace App\Http\Controllers\agenda;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class calendarioController extends Controller
{

    public function json()
    {

        $consulta = DB::table('agendamento as A')
        ->join('clientes as C', 'A.id_cliente', '=', 'C.id')
        ->select('A.id','C.nome as title', 'A.data as start')
        ->get();       

        
        $consulta->toJson();
           
      echo $consulta;
        
        

            //Passando vetor em forma de json
        // echo json_encode($consulta);

        /*CALENDAR*/ 
        //echo  '[{"id":"2","title":"Gilda Paula da Silva Lins ","start":"2017-11-13"},{"id":"4","title":"Marly Moura Melo ","start":"2017-11-18"},{"id":"5","title":"Luiz Carlos Albert Lima ","start":"2017-11-13"},{"id":"6","title":" \tEdilson da Cruz Rodrigues ","start":"2017-11-22"},{"id":"7","title":"Edilson da Cruz Rodrigues ","start":"2017-11-24"}]';

        /*BD*/ 
        //  echo '[{"id":"6","title":"Karina Meguiline Soares ","start":"2017-10-25"},{"id":"7","title":"Michele Oaski","start":"2017-11-14"},{"id":"8","title":"Jorge Serrano","start":"2017-11-09"},{"id":"9","title":"Jorge Serrano Junior","start":"2017-09-11"},{"id":"11","title":"Karina Meguiline Soares ","start":"2017-11-09"},{"id":"13","title":"Karina Meguiline Soares ","start":"2017-02-21"},{"id":"15","title":"s","start":"2017-11-09"}]';
        }

    public function Index()
    {

       


        return view('agenda.calendario');
    }
}
