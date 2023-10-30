<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelaUser extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cpf', 'email', 'phone', 'cep', 'street', 'number', 'neighborhood', 'city', 'state', 'complement'];
}
