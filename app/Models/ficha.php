<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{
    use HasFactory;
    protected $table='fichas';
    protected $primarykey='id';

    protected $fillable = [
        'ficha',
    ];
    public function users()
     {
        return $this->hasMany(User::class,'ficha_id');
    }
}
