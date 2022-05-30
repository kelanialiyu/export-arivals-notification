<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exports extends Model
{
    use HasFactory;
    protected $fillable = ["extracted"];

    public function containerInfo(){
        return $this->hasMany(ContainerInfo::class,"export_id");
    }

}
