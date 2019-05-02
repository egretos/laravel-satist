<?php

namespace App\Http\Controllers;

use App\Helpers\FlashHelper;
use App\Http\Requests\Type\StoreType;
use App\Services\TypeService;

class TypeController extends Controller
{
    private $service;

    public function __construct(TypeService $service)
    {
        $this->middleware('auth');

        $this->service = $service;
    }

    public function index()
    {
        return view('type.index', [
            'types' => $this->service->all(),
        ]);
    }

    public function create()
    {
        return view('type.create');
    }

    public function update()
    {
        return view('type.update');
    }

    public function store(StoreType $request)
    {
        if ($this->service->store($request->all())) {
            \Session::flash(FlashHelper::SUCCESS, __('type.type').' '.__('resource.created'));
            return redirect()->route('types.index');
        }
        \Session::flash(FlashHelper::ERROR, __('resource.saving').' '.__('errors.finished with errors'));

        return redirect()
            ->route('types.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function destroy($id)
    {
        if ($this->service->delete($id)) {
            \Session::flash(FlashHelper::WARNING, view('layouts.components.restore-message', [
                'entity' => __('type.type')." $id ",
                'route' => route('types.restore', ['id' => $id]),
            ])->render());
        } else {
            \Session::flash(FlashHelper::ERROR, __('resource.deleting')." #$id ".__('errors.finished with errors'));
        }

        return redirect()->route('types.index');
    }

    public function restore($id) {
        if ($this->service->restore($id)) {
            \Session::flash(FlashHelper::SUCCESS, __('type.type')." #$id ".__('resource.restored'));
        } else {
            \Session::flash(FlashHelper::ERROR, __('resource.restoring')." #$id ".__('errors.finished with errors'));
        }

        return redirect()
            ->route('types.index');
    }
}