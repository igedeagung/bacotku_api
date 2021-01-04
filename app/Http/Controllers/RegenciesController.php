<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Regencies;
use App\Models\Provinces;

class RegenciesController extends Controller
{
    public function show($id)
    {
        $idd=Provinces::select('id')->where('name', $id)->first();
        // dd($idd->id);
        $datas = Regencies::select('name')->where('province_id', $idd->id)->where('name', 'not like', '%KABUPATEN%')->get();
        $datanya=[
            'data'=>$datas
        ];
        return response()->json($datanya, 200);
    }
}
