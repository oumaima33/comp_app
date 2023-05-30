<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
    use HasFactory;
    protected $table='evaluation';
    protected $fillable=['note1','note2','note3','note4','note5'];
    protected $primarykey='id_ev';
    
    public function judge()
    {
        return $this->belongsTo(Judge::class, 'fk_j');
    }
    
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'fk_par');
    }
        
}
