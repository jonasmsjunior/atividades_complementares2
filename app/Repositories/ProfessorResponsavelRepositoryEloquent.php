<?php

namespace SISAC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SISAC\Repositories\ProfessorResponsavelRepository;
use SISAC\Entities\ProfessorResponsavel;
use SISAC\Validators\ProfessorResponsavelValidator;

/**
 * Class ProfessorResponsavelRepositoryEloquent
 * @package namespace SISAC\Repositories;
 */
class ProfessorResponsavelRepositoryEloquent extends BaseRepository implements ProfessorResponsavelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProfessorResponsavel::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProfessorResponsavelValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
