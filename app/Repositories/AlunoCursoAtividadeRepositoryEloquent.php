<?php

namespace SISAC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SISAC\Repositories\AlunoCursoAtividadeRepository;
use SISAC\Entities\AlunoCursoAtividade;
use SISAC\Validators\AlunoCursoAtividadeValidator;

/**
 * Class AlunoCursoAtividadeRepositoryEloquent
 * @package namespace SISAC\Repositories;
 */
class AlunoCursoAtividadeRepositoryEloquent extends BaseRepository implements AlunoCursoAtividadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AlunoCursoAtividade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AlunoCursoAtividadeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
