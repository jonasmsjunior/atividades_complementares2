<?php

namespace SISAC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SISAC\Repositories\AlunoCursoRepository;
use SISAC\Entities\AlunoCurso;
use SISAC\Validators\AlunoCursoValidator;

/**
 * Class AlunoCursoRepositoryEloquent
 * @package namespace SISAC\Repositories;
 */
class AlunoCursoRepositoryEloquent extends BaseRepository implements AlunoCursoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AlunoCurso::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
