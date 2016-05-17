<?php

namespace SISAC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SISAC\Repositories\AtividadeTipoAtividadeRepository;
use SISAC\Entities\AtividadeTipoAtividade;
use SISAC\Validators\AtividadeTipoAtividadeValidator;

/**
 * Class AtividadeTipoAtividadeRepositoryEloquent
 * @package namespace SISAC\Repositories;
 */
class AtividadeTipoAtividadeRepositoryEloquent extends BaseRepository implements AtividadeTipoAtividadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AtividadeTipoAtividade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AtividadeTipoAtividadeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
