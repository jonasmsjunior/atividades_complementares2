<?php

namespace SISAC\Transformers;

use League\Fractal\TransformerAbstract;
use SISAC\Entities\ProfessorResponsavel;

/**
 * Class ProfessorResponsavelTransformer
 * @package namespace SISAC\Transformers;
 */
class ProfessorResponsavelTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProfessorResponsavel entity
     * @param \ProfessorResponsavel $model
     *
     * @return array
     */
    public function transform(ProfessorResponsavel $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
