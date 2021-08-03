<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $guarded=[];

    public function kategori()
    {
        return $this->belongsTo('App\kategori','id_kategori');//foreign key from kategoris table
    }

    public function transaksi()
    {
        return $this->hasMany('App\transaksi','id_tiket','id');
    }
}
