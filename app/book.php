<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    //
    public $table = "buku";
    protected $fillable = ['judul', 'pengarang', 'kategori', 'tahun_terbit', 'penerbit'];
}
