<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\AlunoCursoAtividadeCreateRequest;
use SISAC\Http\Requests\AlunoCursoAtividadeUpdateRequest;
use SISAC\Repositories\AlunoCursoAtividadeRepository;
use SISAC\Validators\AlunoCursoAtividadeValidator;


class AlunoCursoAtividadesController extends Controller
{

    /**
     * @var AlunoCursoAtividadeRepository
     */
    protected $repository;

    /**
     * @var AlunoCursoAtividadeValidator
     */
    protected $validator;


    public function __construct(AlunoCursoAtividadeRepository $repository, AlunoCursoAtividadeValidator $validator)
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
        $alunoCursoAtividades = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $alunoCursoAtividades,
            ]);
        }

        return view('alunoCursoAtividades.index', compact('alunoCursoAtividades'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('alunoCursoAtividades.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoCursoAtividadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoCursoAtividadeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $alunoCursoAtividade = $this->repository->create($request->all());

            $response = [
                'message' => 'AlunoCursoAtividade created.',
                'data'    => $alunoCursoAtividade->toArray(),
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
        $alunoCursoAtividade = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $alunoCursoAtividade,
            ]);
        }

        return view('alunoCursoAtividades.show', compact('alunoCursoAtividade'));
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

        $alunoCursoAtividade = $this->repository->find($id);

        return view('alunoCursoAtividades.edit', compact('alunoCursoAtividade'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AlunoCursoAtividadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AlunoCursoAtividadeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $alunoCursoAtividade = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AlunoCursoAtividade updated.',
                'data'    => $alunoCursoAtividade->toArray(),
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
                'message' => 'AlunoCursoAtividade deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AlunoCursoAtividade deleted.');
    }
}
