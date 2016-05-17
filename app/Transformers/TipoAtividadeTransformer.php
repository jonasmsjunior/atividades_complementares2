<?php

namespace SISAC\Transformers;

use League\Fractal\TransformerAbstract;
use SISAC\Entities\TipoAtividade;

/**
 * Class TipoAtividadeTransformer
 * @package namespace SISAC\Transformers;
 */
class TipoAtividadeTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoAtividade entity
     * @param \TipoAtividade $model
     *
     * @return array
     */
    public function transform(TipoAtividade $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
