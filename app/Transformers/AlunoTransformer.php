<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16/05/2016
 * Time: 02:13
 */

namespace SISAC\Transformers;

use SISAC\Entities\Aluno;

use League\Fractal\TransformerAbstract;

class AlunoTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['curso'];

    public function transform(Aluno $aluno){
        return[
            'nome' => $aluno->nome,
            'matricula' => $aluno->matricula,
            'aluno_id' => $aluno->id,
            'cursos' => $aluno->cursos,
        ];
    }

    public function includeCurso(Aluno $aluno){
        return $this->collection($aluno->cursos, new CursoTransformer());
    }
}