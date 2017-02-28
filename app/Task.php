<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';
    public function status()
    {
        return $this->belongsTo('\App\Status');
    }
    public function priority()
    {
        return $this->belongsTo('\App\Priority');
    }
}
