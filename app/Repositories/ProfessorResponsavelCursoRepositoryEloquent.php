<?php

namespace SISAC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SISAC\Repositories\ProfessorResponsavelCursoRepository;
use SISAC\Entities\ProfessorResponsavelCurso;
use SISAC\Validators\ProfessorResponsavelCursoValidator;

/**
 * Class ProfessorResponsavelCursoRepositoryEloquent
 * @package namespace SISAC\Repositories;
 */
class ProfessorResponsavelCursoRepositoryEloquent extends BaseRepository implements ProfessorResponsavelCursoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProfessorResponsavelCurso::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProfessorResponsavelCursoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
