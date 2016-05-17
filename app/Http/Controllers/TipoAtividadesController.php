<?php

namespace SISAC\Http\Controllers;

use Illuminate\Http\Request;

use SISAC\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SISAC\Http\Requests\TipoAtividadeCreateRequest;
use SISAC\Http\Requests\TipoAtividadeUpdateRequest;
use SISAC\Repositories\TipoAtividadeRepository;
use SISAC\Validators\TipoAtividadeValidator;


class TipoAtividadesController extends Controller
{

    /**
     * @var TipoAtividadeRepository
     */
    protected $repository;

    /**
     * @var TipoAtividadeValidator
     */
    protected $validator;


    public function __construct(TipoAtividadeRepository $repository, TipoAtividadeValidator $validator)
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
        $tipoAtividades = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoAtividades,
            ]);
        }

        return view('tipoAtividades.index', compact('tipoAtividades'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('tipoAtividades.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoAtividadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoAtividadeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tipoAtividade = $this->repository->create($request->all());

            $response = [
                'message' => 'TipoAtividade created.',
                'data'    => $tipoAtividade->toArray(),
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
        $tipoAtividade = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoAtividade,
            ]);
        }

        return view('tipoAtividades.show', compact('tipoAtividade'));
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

        $tipoAtividade = $this->repository->find($id);

        return view('tipoAtividades.edit', compact('tipoAtividade'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoAtividadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoAtividadeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tipoAtividade = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TipoAtividade updated.',
                'data'    => $tipoAtividade->toArray(),
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
                'message' => 'TipoAtividade deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TipoAtividade deleted.');
    }
}
