<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\ProfessorResponsavelCreateRequest;
use SISAC\Http\Requests\ProfessorResponsavelUpdateRequest;
use SISAC\Repositories\ProfessorResponsavelRepository;
use SISAC\Validators\ProfessorResponsavelValidator;


class ProfessorResponsavelsController extends Controller
{

    /**
     * @var ProfessorResponsavelRepository
     */
    protected $repository;

    /**
     * @var ProfessorResponsavelValidator
     */
    protected $validator;


    public function __construct(ProfessorResponsavelRepository $repository, ProfessorResponsavelValidator $validator)
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
        $professorResponsavels = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professorResponsavels,
            ]);
        }

        return view('professorResponsavels.index', compact('professorResponsavels'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('professorResponsavels.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ProfessorResponsavelCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorResponsavelCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $professorResponsavel = $this->repository->create($request->all());

            $response = [
                'message' => 'ProfessorResponsavel created.',
                'data'    => $professorResponsavel->toArray(),
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
        $professorResponsavel = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professorResponsavel,
            ]);
        }

        return view('professorResponsavels.show', compact('professorResponsavel'));
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

        $professorResponsavel = $this->repository->find($id);

        return view('professorResponsavels.edit', compact('professorResponsavel'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProfessorResponsavelUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProfessorResponsavelUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $professorResponsavel = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProfessorResponsavel updated.',
                'data'    => $professorResponsavel->toArray(),
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
                'message' => 'ProfessorResponsavel deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProfessorResponsavel deleted.');
    }
}
