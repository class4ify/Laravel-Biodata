<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bioModel extends Model
{
    use HasFactory;
    protected $table = "bio_models";
    protected $fillable = ["nama", "nis", "kelas", "email", "tgllhr"];
}
