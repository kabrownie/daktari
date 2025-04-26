<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
  use HasFactory;
class Program extends Model
{
    //

    protected $fillable = ['program_name'];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
