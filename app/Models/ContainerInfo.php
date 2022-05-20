<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerInfo extends Model
{
    use HasFactory;

    public function iso(){
        return $this->belongsTo(IsoType::class,"iso_id");
    }

    public function operator(){
        return $this->belongsTo(Operator::class,"operator_id");
    }

    public function export(){
        return $this->belongsTo(Exports::class,"export_id");
    }

}
