<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\AlunoCreateRequest;
use SISAC\Http\Requests\AlunoUpdateRequest;
use SISAC\Repositories\AlunoRepository;
use SISAC\Validators\AlunoValidator;


class AlunoController extends Controller
{

    /**
     * @var AlunoRepository
     */
    protected $repository;

    /**
     * @var AlunoValidator
     */
    protected $validator;


    public function __construct(AlunoRepository $repository, AlunoValidator $validator)
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
        return $this->repository->all();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('alunos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $aluno = $this->repository->create($request->all());

            $response = [
                'message' => 'Aluno created.',
                'data'    => $aluno->toArray(),
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
        $aluno = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $aluno,
            ]);
        }

        return view('alunos.show', compact('aluno'));
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

        $aluno = $this->repository->find($id);

        return view('alunos.edit', compact('aluno'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AlunoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AlunoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $aluno = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Aluno updated.',
                'data'    => $aluno->toArray(),
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
                'message' => 'Aluno deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Aluno deleted.');
    }
}
