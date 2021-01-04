<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bacot;
use Webpatser\Uuid\Uuid;

class BacotController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('photo');

        $namafile = Uuid::generate(4)->string.'.'.$file->getClientOriginalExtension();
        
        $path = public_path().'/image';
        $file->move($path,$namafile);
        
        $photo=Bacot::create([
            'tanggal' => $request->input('tanggal'),
            'namafile'=>$namafile,
            'judul'=>$request->input('judul'),
            'isi'=>$request->input('isi'),
            'kota'=>$request->input('kota'),
            'provinsi'=>$request->input('provinsi')
        ]);
        $result=[
            'hasil'=>"Data Tersimpan"
        ];
        return response()->json($result, 201);
    }
    public function show()
    {
        $datas = Bacot::select('id','judul', 'isi', 'namafile', 'created_at')->get();
        foreach($datas as $data){
            $data->created_at_date=$data->created_at->format('d-m-Y:H.i');
            unset($data->created_at);
            $data->image=base64_encode(file_get_contents(public_path().'\/image/'.$data->namafile));
        }
        $datanya=[
            'data'=>$datas
        ];
        return response()->json($datanya, 200);
    }

    public function detail($id){
        $data = Bacot::where('id', $id)->first();
        $data->created_at_date=$data->created_at->format('d-m-Y:H.i');
        unset($data->created_at);
        unset($data->updated_at);
        $data->image=base64_encode(file_get_contents(public_path().'\/image/'.$data->namafile));
        $datanya=[
            'data'=>$data
        ];
        return response()->json($datanya, 200);
    }
}
