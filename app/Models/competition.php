<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    use HasFactory;
    protected $table='competitions';
    protected $fillable=['comp_name'
    ,'part_nbr','code'
    ,'description'
    ,'categorie'
    ,'criteria_1'
    ,'criteria_2'
    ,'criteria_3'
    ,'criteria_4'
    ,'criteria_5'
   ];
    protected $primarykey='id';
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    public function jurys()
{
    return $this->hasMany(Judge::class,'competition_id','id');
}

}
