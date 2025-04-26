<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use HasFactory;
class Client extends Model
{
    //  
    protected $fillable = [
        'id', 'client_name', 'sex', 'age', 'telephone'
    ];
    
   


    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
