<?php

namespace App\Models;

use Employes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;
    protected $fillable = ['titre_poste', 'salaire_base', 'departement'];
    public function employes()
    {
        return $this->hasMany(Employes::class);
    }
}
