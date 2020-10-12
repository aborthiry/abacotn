<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWebHookRequest;
use App\Http\Requests\UpdateWebHookRequest;
use App\Repositories\WebHookRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\WebHook;
use Illuminate\Http\Request;
use Flash;
use Response;

class WebHookController extends Controller
{
   

    /**
     * Display a listing of the WebHook.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $webHooks = WebHook::all();

        return view('web_hooks.index')
            ->with('webHooks', $webHooks);
    }

    /**
     * Show the form for creating a new WebHook.
     *
     * @return Response
     */
    public function create()
    {
        return view('web_hooks.create');
    }

    /**
     * Store a newly created WebHook in storage.
     *
     * @param CreateWebHookRequest $request
     *
     * @return Response
     */
    public function store(CreateWebHookRequest $request)
    {
        $input = $request->all();

        $webHook = $this->webHookRepository->create($input);

        Flash::success('Web Hook saved successfully.');

        return redirect(route('webHooks.index'));
    }

    /**
     * Display the specified WebHook.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $webHook = $this->webHookRepository->find($id);

        if (empty($webHook)) {
            Flash::error('Web Hook not found');

            return redirect(route('webHooks.index'));
        }

        return view('web_hooks.show')->with('webHook', $webHook);
    }

    /**
     * Show the form for editing the specified WebHook.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $webHook = $this->webHookRepository->find($id);

        if (empty($webHook)) {
            Flash::error('Web Hook not found');

            return redirect(route('webHooks.index'));
        }

        return view('web_hooks.edit')->with('webHook', $webHook);
    }

    /**
     * Update the specified WebHook in storage.
     *
     * @param int $id
     * @param UpdateWebHookRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWebHookRequest $request)
    {
        $webHook = $this->webHookRepository->find($id);

        if (empty($webHook)) {
            Flash::error('Web Hook not found');

            return redirect(route('webHooks.index'));
        }

        $webHook = $this->webHookRepository->update($request->all(), $id);

        Flash::success('Web Hook updated successfully.');

        return redirect(route('webHooks.index'));
    }

    /**
     * Remove the specified WebHook from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $webHook = $this->webHookRepository->find($id);

        if (empty($webHook)) {
            Flash::error('Web Hook not found');

            return redirect(route('webHooks.index'));
        }

        $this->webHookRepository->delete($id);

        Flash::success('Web Hook deleted successfully.');

        return redirect(route('webHooks.index'));
    }
}
