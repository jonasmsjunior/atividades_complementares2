<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\AtividadeTipoAtividadeCreateRequest;
use SISAC\Http\Requests\AtividadeTipoAtividadeUpdateRequest;
use SISAC\Repositories\AtividadeTipoAtividadeRepository;
use SISAC\Validators\AtividadeTipoAtividadeValidator;


class AtividadeTipoAtividadesController extends Controller
{

    /**
     * @var AtividadeTipoAtividadeRepository
     */
    protected $repository;

    /**
     * @var AtividadeTipoAtividadeValidator
     */
    protected $validator;


    public function __construct(AtividadeTipoAtividadeRepository $repository, AtividadeTipoAtividadeValidator $validator)
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
        $atividadeTipoAtividades = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $atividadeTipoAtividades,
            ]);
        }

        return view('atividadeTipoAtividades.index', compact('atividadeTipoAtividades'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('atividadeTipoAtividades.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AtividadeTipoAtividadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AtividadeTipoAtividadeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $atividadeTipoAtividade = $this->repository->create($request->all());

            $response = [
                'message' => 'AtividadeTipoAtividade created.',
                'data'    => $atividadeTipoAtividade->toArray(),
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
        $atividadeTipoAtividade = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $atividadeTipoAtividade,
            ]);
        }

        return view('atividadeTipoAtividades.show', compact('atividadeTipoAtividade'));
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

        $atividadeTipoAtividade = $this->repository->find($id);

        return view('atividadeTipoAtividades.edit', compact('atividadeTipoAtividade'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AtividadeTipoAtividadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AtividadeTipoAtividadeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $atividadeTipoAtividade = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AtividadeTipoAtividade updated.',
                'data'    => $atividadeTipoAtividade->toArray(),
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
                'message' => 'AtividadeTipoAtividade deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AtividadeTipoAtividade deleted.');
    }
}
