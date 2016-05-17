<?php

namespace SISAC\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AlunoCurso extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function Aluno(){
        return $this->belongsTo(Aluno::class);
    }
}
