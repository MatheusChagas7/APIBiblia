<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testamento extends Model
{
    use HasFactory;

    protected $fillable = [ 'nome' ];

    /* PEGAR TODOS OS LIVROS VINCULADOS*/

    public function livros(){

        return $this->hasMany(Livro::class);

    }
    
}
