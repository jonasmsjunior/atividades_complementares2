<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\AlunoCursoCreateRequest;
use SISAC\Http\Requests\AlunoCursoUpdateRequest;
use SISAC\Repositories\AlunoCursoRepository;
use SISAC\Validators\AlunoCursoValidator;


class AlunoCursoController extends Controller
{

    /**
     * @var AlunoCursoRepository
     */
    protected $repository;

    /**
     * @var AlunoCursoValidator
     */
    //protected $validator;


    public function __construct(AlunoCursoRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->repository->all();

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('alunoCursos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoCursoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoCursoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $alunoCurso = $this->repository->create($request->all());

            $response = [
                'message' => 'AlunoCurso created.',
                'data'    => $alunoCurso->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alunoCurso = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $alunoCurso,
            ]);
        }

        return view('alunoCursos.show', compact('alunoCurso'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $alunoCurso = $this->repository->find($id);

        return view('alunoCursos.edit', compact('alunoCurso'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AlunoCursoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AlunoCursoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $alunoCurso = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AlunoCurso updated.',
                'data'    => $alunoCurso->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'AlunoCurso deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AlunoCurso deleted.');
    }
}
