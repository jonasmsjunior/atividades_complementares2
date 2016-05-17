<?php

namespace SISAC\Entities;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
       'descricao',
       'horas_atividades'
    ];
    public function alunos(){
        return $this->belongsToMany(Aluno::class, 'aluno_cursos', 'curso_id', 'aluno_id');
    }
}
