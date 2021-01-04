<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Provinces;

class ProvinceController extends Controller
{
    public function get()
    {
        $datas = Provinces::select('name')->get();
        $datanya=[
            'data'=>$datas
        ];
        return response()->json($datanya, 200);
    }
}
