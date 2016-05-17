<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 13/05/2016
 * Time: 22:19
 */

namespace SISAC\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use SISAC\Entities\Curso;

class CursoRepositoryEloquent extends BaseRepository implements CursoRepository
{
    public function model()
    {
        return Curso::class;
    }
}