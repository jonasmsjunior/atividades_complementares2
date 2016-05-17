<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 13/05/2016
 * Time: 23:08
 */

namespace SISAC\Services;


use Illuminate\Contracts\Validation\ValidationException;
use SISAC\Repositories\CursoRepository;
use SISAC\Validators\CursoValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class CursoService
{
    protected $repository;
    protected $validator;
    public function __construct(CursoRepository $repository, CursoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    public function create(array $data){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }catch (ValidatorException $e){
            return [
                'erro' => true,
                'msg' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }catch (ValidatorException $e){
            return [
                'erro' => true,
                'msg' => $e
            ];
        }
    }
}