<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;

class MakananController extends Controller
{
    /**
* index
*
* @return void
*/
public function index()
{

//get posts
$makanan = Makanan::get();
//render view with posts
return view('makanan.index', compact('makanan'));
}
}
