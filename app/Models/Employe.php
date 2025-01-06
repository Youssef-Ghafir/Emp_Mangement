<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "fullname",
        "email",
        "password",
        "birth_date",
        "depart",
        "role",
        "hire_date",
        "phone",
        "address",
        "user_id",
        "start_working",
        "id_poste",
        "id_supervisor",
    ];
    public function post()
    {
        return $this->belongsTo(Poste::class);
    }
}
