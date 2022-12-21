<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Http\Controllers\Controller;
use App\Http\Resources\MakananResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class MakananController extends Controller
{
    public function index(){
        $makanans = Makanan::all(); //Mengambil semua data Makanan
      
      $Makanan= Makanan::latest()->get(); //Mengambil semua data Makanan

      if(count($makanans) > 0){
          return response([
              'message' => 'Retrieve All Success',
              'data' => $makanans
          ], 200);
      } //Return data semua Makanan dalam bentuk JSON

      return response([
          'message' => 'Empty',
          'data' => null
      ], 400); //Return message data Makanan kosong

      return new MakananResource(true, 'List Data Makanan', $Makanan);
  }

  //Method untuk menampilkan 1 data Makanan (SEARCH)
  public function show($id){
      $makanans = Makanan::find($id); //Mencari data Makanan berdasarkan id

      if(!is_null($makanans)){
          return response([
              'message' => 'Retrieve Makanan Success',
              'data' => $makanans
          ], 200);
      } //Return data semua Makanan dalam bentuk JSON

      return response([
          'message' => 'Makanan Not Found',
          'data' => null
      ], 400); //Return message data Makanan kosong

      return view ('Makanan.show', compact('Makanan'));
  }

  //Method untuk menambah 1 data Makanan baru (CREATE)
  public function store(Request $request){
      $storeData = $request->all(); //Mengambil semua input dari API Client
      $validator = Validator::make($storeData, [
          'nama' => 'required',
          'jenis' => 'required',
          'jumlah' => 'required',
      ]); //Membuat rule validasi input

      if($validator->fails()){
          return response(['message' => $validator->errors()], 400); //Return error invalid input
      }

      $makanan = Makanan::create($storeData);

      return response([
          'message' => 'Add Makanan Success',
          'data' => $makanan
      ], 200); //Return message data Makanan baru dalam bentuk JSON

      return new MakananResource (true, 'Data Makanan Berhasil Ditambahkan!', $makanan);
  }

  //Method untuk menghapus 1 data product (DELETE)
  public function destroy(Makanan $makanan,$id){
      $makanan = Makanan::find($id); //Mencari data product berdasarkan id

      if(is_null($makanan)){
          return response([
              'message' => 'Makanan Not Found',
              'date' => null
          ], 404);
      } //Return message saat data Makanan tidak ditemukan

      if($makanan->delete()){
          return response([
              'message' => 'Delete Makanan Success',
              'data' => $makanan
          ], 200);
          $makanan = Makanan::where('id', $id)->firstorfail()->delete();
          return redirect()->route('Makanan.index')->with(['success'=>'Data Berhasil Dihapus!']);
      } //Return message saat berhasil menghapus data Makanan

      return response([
          'message' => 'Delete Makanan Failed',
          'data' => null,
      ], 400);

      
  }

  //Method untuk mengubah 1 data Makanan (UPDATE)
  public function update(Request $request, $id){
        $makanan = Makanan::find($id); //Mencari data Makanan berdasarkan id

        $updateData = $request->all(); //Mengambil semua input dari API Client
        $validator = Validator::make($updateData, [
            'nama' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
        ]); //Membuat rule validasi input

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        
        if($makanan) {

            //update post
            $makanan->nama = $updateData['nama']; //Edit judulMakanan
            $makanan->jenis = $updateData['jenis']; //Edit isbn
            $makanan->jumlah = $updateData['jumlah']; //Edit tahunterbit

            if($makanan->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Update Makanan Berhasil',
                    'data'    => $makanan  
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Update Makanan Gagal',
            ], 400);
        }

        return response()->json([
            'success' => false,
            'message' => 'Makanan Not Found',
        ], 404);
    }
}
