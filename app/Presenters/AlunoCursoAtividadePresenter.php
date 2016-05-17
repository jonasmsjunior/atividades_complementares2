<?php

namespace SISAC\Presenters;

use SISAC\Transformers\AlunoCursoAtividadeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AlunoCursoAtividadePresenter
 *
 * @package namespace SISAC\Presenters;
 */
class AlunoCursoAtividadePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AlunoCursoAtividadeTransformer();
    }
}
