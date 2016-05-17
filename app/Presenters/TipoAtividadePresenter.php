<?php

namespace SISAC\Presenters;

use SISAC\Transformers\TipoAtividadeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoAtividadePresenter
 *
 * @package namespace SISAC\Presenters;
 */
class TipoAtividadePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoAtividadeTransformer();
    }
}
