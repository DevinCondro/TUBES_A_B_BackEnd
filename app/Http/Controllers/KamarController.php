<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Http\Controllers\Controller;
use App\Http\Resources\KamarResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator; 

class KamarController extends Controller
{
public function index(){
    $kamars = Kamar::all(); //Mengambil semua data kamar
      
      $kamar= Kamar::latest()->get(); //Mengambil semua data kamar

      if(count($kamars) > 0){
          return response([
              'message' => 'Retrieve All Success',
              'data' => $kamars
          ], 200);
      } //Return data semua kamar dalam bentuk JSON

      return response([
          'message' => 'Empty',
          'data' => null
      ], 400); //Return message data kamar kosong

      return new KamarResource(true, 'List Data Kamar', $kamar);
  }

  //Method untuk menampilkan 1 data kamar (SEARCH)
  public function show($id){
      $kamars = Kamar::find($id); //Mencari data kamar berdasarkan id

      if(!is_null($kamars)){
          return response([
              'message' => 'Retrieve kamar Success',
              'data' => $kamars
          ], 200);
      } //Return data semua kamar dalam bentuk JSON

      return response([
          'message' => 'Kamar Not Found',
          'data' => null
      ], 400); //Return message data kamar kosong

      return view ('kamar.show', compact('kamar'));
  }

  //Method untuk menambah 1 data kamar baru (CREATE)
  public function store(Request $request){
      $storeData = $request->all(); //Mengambil semua input dari API Client
      $validator = Validator::make($storeData, [
          'jenis' => 'required',
          'jumlah' => 'required|numeric',
          'harga' => 'required',
      ]); //Membuat rule validasi input

      if($validator->fails()){
        return response(['message' => $validator->errors()], 400); //Return error invalid input
        }

      $kamar = Kamar::create($storeData);

      return response([
          'message' => 'Add kamar Success',
          'data' => $kamar
      ], 200); //Return message data kamar baru dalam bentuk JSON

      return new KamarResource (true, 'Data Kamar Berhasil Ditambahkan!', $kamar);
  }

  //Method untuk menghapus 1 data product (DELETE)
  public function destroy(Kamar $kamar,$id){
      $kamar = Kamar::find($id); //Mencari data product berdasarkan id

      if(is_null($kamar)){
          return response([
              'message' => 'Kamar Not Found',
              'date' => null
          ], 404);
      } //Return message saat data kamar tidak ditemukan

      if($kamar->delete()){
          return response([
              'message' => 'Delete kamar Success',
              'data' => $kamar
          ], 200);
          $kamar = Kamar::where('id', $id)->firstorfail()->delete();
          return redirect()->route('kamar.index')->with(['success'=>'Data Berhasil Dihapus!']);
      } //Return message saat berhasil menghapus data kamar

      return response([
          'message' => 'Delete kamar Failed',
          'data' => null,
      ], 400);

      
  }

  //Method untuk mengubah 1 data kamar (UPDATE)
  public function update(Request $request, $id){
        $kamar = Kamar::find($id); //Mencari data kamar berdasarkan id

        $updateData = $request->all(); //Mengambil semua input dari API Client
        $validator = Validator::make($updateData, [
            'jenis' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required',
        ]); //Membuat rule validasi input

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        
        if($kamar) {

            //update post
            $kamar->jenis = $updateData['jenis']; //Edit judulkamar
            $kamar->jumlah = $updateData['jumlah']; //Edit isbn
            $kamar->harga = $updateData['harga']; //Edit tahunterbit

            if($kamar->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Update Pemesanan Kamar Berhasil',
                    'data'    => $kamar  
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Update Pemesanan Kamar Gagal',
            ], 400);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kamar Not Found',
        ], 404);
    }
}
