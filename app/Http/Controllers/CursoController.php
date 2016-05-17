<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;
use SISAC\Repositories\CursoRepository;
use SISAC\Services\CursoService;

class CursoController extends Controller
{
    /*
     * @var CursoRepository
     */
    private $repository;
    private $service;
    public function __construct(CursoRepository $repository, CursoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(){
        //return $id_user = \Authorizer::getResourceOwnerId();
        return $this->repository->all();
    }
    public function store(Request $request){
        return $this->service->create($request->all());
    }
    public function update(Request $request){
        return $this->service->update($request->all());
    }
    public function show($id){
        return $this->repository->find($id);
    }
    public function destroy($id){
        $this->repository->find($id)->delete();
    }

}
