<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\ProfessorResponsavelCursoCreateRequest;
use SISAC\Http\Requests\ProfessorResponsavelCursoUpdateRequest;
use SISAC\Repositories\ProfessorResponsavelCursoRepository;
use SISAC\Validators\ProfessorResponsavelCursoValidator;


class ProfessorResponsavelCursosController extends Controller
{

    /**
     * @var ProfessorResponsavelCursoRepository
     */
    protected $repository;

    /**
     * @var ProfessorResponsavelCursoValidator
     */
    protected $validator;


    public function __construct(ProfessorResponsavelCursoRepository $repository, ProfessorResponsavelCursoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $professorResponsavelCursos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professorResponsavelCursos,
            ]);
        }

        return view('professorResponsavelCursos.index', compact('professorResponsavelCursos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('professorResponsavelCursos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ProfessorResponsavelCursoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorResponsavelCursoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $professorResponsavelCurso = $this->repository->create($request->all());

            $response = [
                'message' => 'ProfessorResponsavelCurso created.',
                'data'    => $professorResponsavelCurso->toArray(),
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
        $professorResponsavelCurso = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professorResponsavelCurso,
            ]);
        }

        return view('professorResponsavelCursos.show', compact('professorResponsavelCurso'));
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

        $professorResponsavelCurso = $this->repository->find($id);

        return view('professorResponsavelCursos.edit', compact('professorResponsavelCurso'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProfessorResponsavelCursoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProfessorResponsavelCursoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $professorResponsavelCurso = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProfessorResponsavelCurso updated.',
                'data'    => $professorResponsavelCurso->toArray(),
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
                'message' => 'ProfessorResponsavelCurso deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProfessorResponsavelCurso deleted.');
    }
}
