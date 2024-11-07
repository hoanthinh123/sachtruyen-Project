<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;
    protected $fillable = [
        "tendm",
        "mota",
        "kichhoat",
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';
}
