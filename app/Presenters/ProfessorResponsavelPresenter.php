<?php

namespace SISAC\Presenters;

use SISAC\Transformers\ProfessorResponsavelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProfessorResponsavelPresenter
 *
 * @package namespace SISAC\Presenters;
 */
class ProfessorResponsavelPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProfessorResponsavelTransformer();
    }
}
