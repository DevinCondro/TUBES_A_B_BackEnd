<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator; 

class KamarController extends Controller
{
//Method untuk menampilkan semua data product (READ)
public function index(){
      $kamars = Kamar::all(); //Mengambil semua data Buku

      if(count($kamars) > 0){
          return response([
              'message' => 'Retrieve All Success',
              'data' => $kamars
          ], 200);
      } //Return data semua buku dalam bentuk JSON

      return response([
          'message' => 'Empty',
          'data' => null
      ], 400); //Return message data buku kosong
  }

  //Method untuk menampilkan 1 data buku (SEARCH)
  public function show($id){
      $kamars = Kamar::find($id); //Mencari data buku berdasarkan id

      if(!is_null($kamars)){
          return response([
              'message' => 'Retrieve Buku Success',
              'data' => $kamars
          ], 200);
      } //Return data semua buku dalam bentuk JSON

      return response([
          'message' => 'Buku Not Found',
          'data' => null
      ], 400); //Return message data buku kosong
  }

  //Method untuk menambah 1 data buku baru (CREATE)
  public function store(Request $request){
      $storeData = $request->all(); //Mengambil semua input dari API Client
      $validate = Validator::make($storeData, [
          'jenis' => 'required',
          'jumlah' => 'required|numeric',
          'harga' => 'required|numeric',
      ]); //Membuat rule validasi input

      if($validate->fails()){
          return response(['message' => $validate->errors()], 400); //Return error invalid input
      }

      $kamar = Kamar::create($storeData);

      return response([
          'message' => 'Add Buku Success',
          'data' => $kamar
      ], 200); //Return message data buku baru dalam bentuk JSON
  }

  //Method untuk menghapus 1 data product (DELETE)
  public function destroy($id){
      $kamar = Kamar::find($id); //Mencari data product berdasarkan id

      if(is_null($kamar)){
          return response([
              'message' => 'Buku Not Found',
              'date' => null
          ], 404);
      } //Return message saat data buku tidak ditemukan

      if($kamar->delete()){
          return response([
              'message' => 'Delete Buku Success',
              'data' => $kamar
          ], 200);
      } //Return message saat berhasil menghapus data buku

      return response([
          'message' => 'Delete Buku Failed',
          'data' => null,
      ], 400);
  }

  //Method untuk mengubah 1 data buku (UPDATE)
  public function update(Request $request, $id){
      $kamar = Kamar::find($id); //Mencari data buku berdasarkan id

      if(is_null($kamar)){
          return response([
              'message' => 'Buku Not Found',
              'data' => null
          ], 404);
      } //Return message saat data buku tidak ditemukan

      $updateData = $request->all();
      $validate = Validator::make($updateData, [
          'judulBuku' => 'required|max:60|regex:/^[\pL\s\-]+$/u',
          'isbn' => 'required|numeric',
          'pengarang' => 'required',
          'tahunTerbit' => 'required|numeric|digits:4'
      ]); //Membuat rule validasi input

      if($validate->fails()){
          return response(['message' => $validate->errors()], 400); //Return error invalid input
      }

      $buku->judulBuku = $updateData['judulBuku']; //Edit judulBuku
      $buku->isbn = $updateData['isbn']; //Edit isbn
      $buku->tahunTerbit = $updateData['tahunTerbit']; //Edit tahunterbit
      $buku->pengarang = $updateData['pengarang']; //Edit pengarang

      if($buku->save()){
          return response([
              'message' => 'Update Buku Success',
              'data' => $buku
          ], 200);
      } //Return data buku yang telah di EDIT dalam bentuk JSON

      return response([
          'message' => 'Update Buku Failed',
          'data' => null
      ], 400);
  }
}
