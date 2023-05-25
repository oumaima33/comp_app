<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table='participant';
    protected $fillable=['name'
    ,'submission'];
    protected $primarykey='id';
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
