<?php

namespace SISAC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SISAC\Repositories\AtividadeRepository;
use SISAC\Entities\Atividade;
use SISAC\Validators\AtividadeValidator;

/**
 * Class AtividadeRepositoryEloquent
 * @package namespace SISAC\Repositories;
 */
class AtividadeRepositoryEloquent extends BaseRepository implements AtividadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Atividade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AtividadeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
