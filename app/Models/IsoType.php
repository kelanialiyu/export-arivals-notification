<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoType extends Model
{
    use HasFactory;

    public function containerInfo(){
        return $this->hasMany(ContainerInfo::class,"iso_id","id");
    }
}
