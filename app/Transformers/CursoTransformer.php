<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16/05/2016
 * Time: 02:13
 */

namespace SISAC\Transformers;

use SISAC\Entities\Curso;
use League\Fractal\TransformerAbstract;

class CursoTransformer extends TransformerAbstract
{
    public function transform(Curso $curso){
        return[
            'nome' => $curso->descricao,
            'horas' => $curso->horas_atividades,
        ];
    }
}