<?php

namespace SISAC\Presenters;

use SISAC\Transformers\ProfessorResponsavelCursoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProfessorResponsavelCursoPresenter
 *
 * @package namespace SISAC\Presenters;
 */
class ProfessorResponsavelCursoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProfessorResponsavelCursoTransformer();
    }
}
