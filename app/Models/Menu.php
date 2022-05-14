<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $primarykey = 'id';
    protected $fillable = ['id', 'nama_menu', 'harga', 'deskripsi'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
