<?php

namespace SISAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Aluno extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function AlunoCurso(){
        return $this->hasMany(AlunoCurso::class);
    }
    public function Cursos(){
        return $this->belongsToMany(Curso::class, 'aluno_cursos', 'aluno_id', 'curso_id');
    }

}
