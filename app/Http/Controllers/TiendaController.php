<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTiendaRequest;
use App\Http\Requests\UpdateTiendaRequest;

use App\Http\Controllers\AppBaseController;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Flash;
use Response;

class TiendaController extends Controller
{
  

    /**
     * Display a listing of the Tienda.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tiendas = Tienda::all();
        return view('tiendas.index')
            ->with('tiendas', $tiendas);
    }

    /**
     * Show the form for creating a new Tienda.
     *
     * @return Response
     */
    public function create()
    {
        return view('tiendas.create');
    }

    /**
     * Store a newly created Tienda in storage.
     *
     * @param CreateTiendaRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $tienda = new Tienda($request->all());

        $this->validate($request, [
            'client_id' => 'required | numeric|unique:tienda,client_id',
            'client_secret' => 'required',
            'store_id' => 'sometimes|numeric|unique:tienda,store_id'
        ]);

        $tienda->save();

        Flash::success('Tienda saved successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Display the specified Tienda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tienda = $this->tiendaRepository->find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.show')->with('tienda', $tienda);
    }

    /**
     * Show the form for editing the specified Tienda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tienda = Tienda::find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.edit')->with('tienda', $tienda);
    }

    /**
     * Update the specified Tienda in storage.
     *
     * @param int $id
     * @param UpdateTiendaRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $tienda = Tienda::find($id);
        $this->validate($request, [
            'client_id' => 'required|numeric|unique:tienda,client_id,'.$tienda->id.',',
            'client_secret' => 'required',
            'store_id' => 'sometimes|numeric|unique:tienda,store_id,'.$tienda->id.','
        ]);
     //   'nrodni' => 'required|numeric|unique:espontaneo,nrodni,'.$espontaneo->nrodni.',nrodni',
       

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        

        $tienda->fill($request->all());

        $tienda->save();


        Flash::success('Tienda updated successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Remove the specified Tienda from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tienda = Tienda::find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        $tienda->delete();

        Flash::success('Tienda deleted successfully.');

        return redirect(route('tiendas.index'));
    }
}
