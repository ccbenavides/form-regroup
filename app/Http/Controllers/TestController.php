<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function saldos(){
        $saldos_favor = \App\SaldoFavor::all();
        foreach ($saldos_favor as $key => $favor) {
            # code...
            \App\Saldo::where('TARCODIGO', $favor->TARCODIGO)
            ->update(['TARSALDOS' => $favor->TARSALDOS]);
        }
        $saldos = \App\Saldo::all();
        return view('saldos')->with([
            'saldos' => $saldos
        ]);
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
