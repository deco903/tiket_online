<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable=['id_tiket','qty','status'];
    //protected $guarded=[];

    public function tiket()
    {
        return $this->belongsTo('App\tiket','id_tiket','id');//foreign key from kategoris table
    }
}
