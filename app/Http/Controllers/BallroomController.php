<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BallroomResource;
use App\Models\Ballroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class BallroomController extends Controller
{
    public function index(){
        $ballrooms = Ballroom::all(); //Mengambil semua data Ballroom
      
      $ballrooms= Ballroom::latest()->get(); //Mengambil semua data Ballroom

      if(count($ballrooms) > 0){
          return response([
              'message' => 'Retrieve All Success',
              'data' => $ballrooms
          ], 200);
      } //Return data semua Ballroom dalam bentuk JSON

      return response([
          'message' => 'Empty',
          'data' => null
      ], 400); //Return message data Ballroom kosong

      return new BallroomResource(true, 'List Data Ballroom', $ballrooms);
  }

  //Method untuk menampilkan 1 data Ballroom (SEARCH)
  public function show($id){
      $ballrooms = Ballroom::find($id); //Mencari data Ballroom berdasarkan id

      if(!is_null($ballrooms)){
          return response([
              'message' => 'Retrieve Ballroom Success',
              'data' => $ballrooms
          ], 200);
      } //Return data semua Ballroom dalam bentuk JSON

      return response([
          'message' => 'Ballroom Not Found',
          'data' => null
      ], 400); //Return message data Ballroom kosong

      return view ('Ballroom.show', compact('Ballroom'));
  }

  //Method untuk menambah 1 data Ballroom baru (CREATE)
  public function store(Request $request){
      $storeData = $request->all(); //Mengambil semua input dari API Client
      $validator = Validator::make($storeData, [
          'namaPemesan' => 'required',
          'tempat' => 'required',
          'fasilitas' => 'required',
          'jenisPembayaran' => 'required',
      ]); //Membuat rule validasi input

      if($validator->fails()){
          return response(['message' => $validator->errors()], 400); //Return error invalid input
      }

      $ballrooms = Ballroom::create($storeData);

      return response([
          'message' => 'Add Ballroom Success',
          'data' => $ballrooms
      ], 200); //Return message data Ballroom baru dalam bentuk JSON

      return new BallroomResource (true, 'Data Ballroom Berhasil Ditambahkan!', $ballrooms);
  }

  //Method untuk menghapus 1 data product (DELETE)
  public function destroy(Ballroom $ballrooms,$id){
      $ballrooms = Ballroom::find($id); //Mencari data product berdasarkan id

      if(is_null($ballrooms)){
          return response([
              'message' => 'Ballroom Not Found',
              'date' => null
          ], 404);
      } //Return message saat data Ballroom tidak ditemukan

      if($ballrooms->delete()){
          return response([
              'message' => 'Delete Ballroom Success',
              'data' => $ballrooms
          ], 200);
          $ballrooms = Ballroom::where('id', $id)->firstorfail()->delete();
          return redirect()->route('Ballroom.index')->with(['success'=>'Data Berhasil Dihapus!']);
      } //Return message saat berhasil menghapus data Ballroom

      return response([
          'message' => 'Delete Ballroom Failed',
          'data' => null,
      ], 400);

      
  }

  //Method untuk mengubah 1 data Ballroom (UPDATE)
  public function update(Request $request, $id){
        $ballrooms = Ballroom::find($id); //Mencari data Ballroom berdasarkan id

        $updateData = $request->all(); //Mengambil semua input dari API Client
        $validator = Validator::make($updateData, [
            'namaPemesan' => 'required',
            'tempat' => 'required',
            'fasilitas' => 'required',
            'jenisPembayaran' => 'required',
        ]); //Membuat rule validasi input

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        
        if($ballrooms) {

            //update post
            $ballrooms->namaPemesan = $updateData['namaPemesan']; //Edit judulBallroom
            $ballrooms->tempat = $updateData['tempat']; //Edit isbn
            $ballrooms->fasilitas = $updateData['fasilitas']; //Edit tahunterbit
            $ballrooms->jenisPembayaran = $updateData['jenisPembayaran']; //Edit Pembayaran

            if($ballrooms->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Update Ballroom Berhasil',
                    'data'    => $ballrooms  
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Update Ballroom Gagal',
            ], 400);
        }

        return response()->json([
            'success' => false,
            'message' => 'Ballroom Not Found',
        ], 404);
    }
}
