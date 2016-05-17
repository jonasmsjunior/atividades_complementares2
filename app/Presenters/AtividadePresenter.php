<?php

namespace SISAC\Presenters;

use SISAC\Transformers\AtividadeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AtividadePresenter
 *
 * @package namespace SISAC\Presenters;
 */
class AtividadePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AtividadeTransformer();
    }
}
