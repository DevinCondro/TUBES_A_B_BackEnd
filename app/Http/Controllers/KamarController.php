<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
      /**
* index
*
* @return void
*/
public function index()
{

//get posts
$kamar = Kamar::get();
//render view with posts
return view('kamar.index', compact('kamar'));
}
}
