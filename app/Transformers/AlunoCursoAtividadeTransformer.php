<?php

namespace SISAC\Transformers;

use League\Fractal\TransformerAbstract;
use SISAC\Entities\AlunoCursoAtividade;

/**
 * Class AlunoCursoAtividadeTransformer
 * @package namespace SISAC\Transformers;
 */
class AlunoCursoAtividadeTransformer extends TransformerAbstract
{

    /**
     * Transform the \AlunoCursoAtividade entity
     * @param \AlunoCursoAtividade $model
     *
     * @return array
     */
    public function transform(AlunoCursoAtividade $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
