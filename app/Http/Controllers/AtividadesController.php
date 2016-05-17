<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\AtividadeCreateRequest;
use SISAC\Http\Requests\AtividadeUpdateRequest;
use SISAC\Repositories\AtividadeRepository;
use SISAC\Validators\AtividadeValidator;


class AtividadesController extends Controller
{

    /**
     * @var AtividadeRepository
     */
    protected $repository;

    /**
     * @var AtividadeValidator
     */
    protected $validator;


    public function __construct(AtividadeRepository $repository, AtividadeValidator $validator)
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
        $atividades = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $atividades,
            ]);
        }

        return view('atividades.index', compact('atividades'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('atividades.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AtividadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AtividadeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $atividade = $this->repository->create($request->all());

            $response = [
                'message' => 'Atividade created.',
                'data'    => $atividade->toArray(),
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
        $atividade = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $atividade,
            ]);
        }

        return view('atividades.show', compact('atividade'));
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

        $atividade = $this->repository->find($id);

        return view('atividades.edit', compact('atividade'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AtividadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AtividadeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $atividade = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Atividade updated.',
                'data'    => $atividade->toArray(),
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
                'message' => 'Atividade deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Atividade deleted.');
    }
}
