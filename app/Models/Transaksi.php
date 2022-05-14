<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primarykey = 'id';
    protected $fillable = ['id', 'nama_pelanggan', 'menu_id', 'jumlah', 'nama_pegawai', 'tgl'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
