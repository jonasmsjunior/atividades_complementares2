<?php

namespace SISAC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SISAC\Repositories\TipoAtividadeRepository;
use SISAC\Entities\TipoAtividade;
use SISAC\Validators\TipoAtividadeValidator;

/**
 * Class TipoAtividadeRepositoryEloquent
 * @package namespace SISAC\Repositories;
 */
class TipoAtividadeRepositoryEloquent extends BaseRepository implements TipoAtividadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoAtividade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TipoAtividadeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
