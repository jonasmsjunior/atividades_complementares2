<?php

namespace SISAC\Transformers;

use League\Fractal\TransformerAbstract;
use SISAC\Entities\Atividade;

/**
 * Class AtividadeTransformer
 * @package namespace SISAC\Transformers;
 */
class AtividadeTransformer extends TransformerAbstract
{

    /**
     * Transform the \Atividade entity
     * @param \Atividade $model
     *
     * @return array
     */
    public function transform(Atividade $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
