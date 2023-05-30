<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;
    protected $table='judge';
    protected $fillable=['name'
    ,'categorie','competition_id','comp_code'];
    protected $primarykey='id';
    
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'fk_j');
    }
    public function competitions()
    {
        return $this->hasMany(Competition::class,'id','competition_id');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }
}
