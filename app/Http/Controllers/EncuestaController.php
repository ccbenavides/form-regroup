<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    //
    public function index(){
        $data = \App\Encuesta::all();
        return view("encuesta")->with([
            'data' => $data
        ]);
    }
    
    public function procesar(Request $request){
        $file = $request->file('encuesta');
        // $file = public_path('/data/clientes.csv');
        $init_pregunta = 2;
        $razon_sociales = [];
        $array_pregunta = [];
        $encuesta = \App\Encuesta::create([
            "nombre" => $file->getClientOriginalName()            
        ]);
        $header = $this->getHeader($file);
        foreach ($header as $key => $pregunta) {
            $pregunta_id = 0;
            if ($key >= $init_pregunta){
                $pregunta = \App\Pregunta::create([
                    'nombre' =>  $header[$init_pregunta],
                    'encuesta_id' => $encuesta->id
                ]);
                $init_pregunta++;
                $pregunta_id = $pregunta->id;
            }
            array_push($array_pregunta, $pregunta_id);

        }
        $customerArr = $this->csvToArray($file);
        for ($i = 0; $i < count($customerArr); $i ++) {
            $coordinador = \App\Coordinador::updateOrCreate([
                'nombre' => $customerArr[$i][$header[1]]
            ]);
            $init_respuesta = 2;
            foreach ($header as $key => $pregunta) {
                if ($key >= $init_respuesta){
                    \App\Respuesta::create([
                        'respuesta' =>  $customerArr[$i][$header[$init_respuesta]],
                        'pregunta_id' => $array_pregunta[$init_respuesta],
                        'coordinador_id' => $coordinador->id
                    ]);
                    $init_respuesta++;
                }
            }
        }
        $request->session()->flash('alert-success', 'Base de encuestas ha sido actualizada con éxito');
        return redirect()->route('encuesta');
    }
    
    public function detalle(){
        $encuesta  = \App\Encuesta::find(1);
        $preguntas = \App\Pregunta::where('encuesta_id', $encuesta->id)->get();
        $coordinador = \App\Coordinador::find(2);
        
        return view("encuesta-detalle")->with([
            'encuesta' => $encuesta,
            'preguntas' => $preguntas,
            'coordinador' => $coordinador
        ]);        
    }
    

    function getHeader($filename = '', $delimiter = ','){
        if (!file_exists($filename) || !is_readable($filename))
            return false;
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            if  (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
               $header =  $row;
            }
            fclose($handle);
        }

        return $header;

    }


    public function csvToArray($filename = '', $delimiter = ',') {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

}
