<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16/05/2016
 * Time: 02:23
 */

namespace SISAC\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use SISAC\Transformers\AlunoTransformer;

class AlunoPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new AlunoTransformer();
    }
}