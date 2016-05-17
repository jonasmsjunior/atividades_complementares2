<?php

namespace SISAC\Transformers;

use League\Fractal\TransformerAbstract;
use SISAC\Entities\ProfessorResponsavelCurso;

/**
 * Class ProfessorResponsavelCursoTransformer
 * @package namespace SISAC\Transformers;
 */
class ProfessorResponsavelCursoTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProfessorResponsavelCurso entity
     * @param \ProfessorResponsavelCurso $model
     *
     * @return array
     */
    public function transform(ProfessorResponsavelCurso $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
