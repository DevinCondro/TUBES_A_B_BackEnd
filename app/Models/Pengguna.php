<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    /**
* fillable
*
* @var array
*/
protected $fillable = [
'nama',
'email',
'no_telp',
'tanggal_lahir',
'gender',
'alamat',
]; 
  
}

