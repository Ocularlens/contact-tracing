<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Store extends Model
{
    //
    protected $primaryKey = 'store_id';

    protected $fillable = [
        'store_name', 'person_id', 'qr_code', 'description', 'store_owner'
    ];

    public function store_logs()
    {
        return $this->belongsToMany('App\Person', 'person_store', 'store_id', 'person_id')
            ->withPivot(['created_at']);
    }
}
