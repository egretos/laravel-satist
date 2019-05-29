<?php

namespace App\Http\Controllers;

use App\Helpers\FlashHelper;
use App\Http\Requests\Entity\StoreEntity;
use App\Models\Entity;
use App\Services\EntityService;

class EntityController extends Controller
{
    /** @var EntityService $service */
    private $service;

    public function __construct(EntityService $service)
    {
        $this->middleware('auth');

        $this->service = $service;
    }

    public function index()
    {
        return view('entity.index', [
            'models' => Entity::all(),
        ]);
    }

    public function create()
    {
        return view('entity.create');
    }

    public function edit($id)
    {
        return view('entity.edit', [
            'model' => Entity::findOrFail($id)
        ]);
    }

    public function store(StoreEntity $request)
    {
        if ($this->service->store($request->all())) {
            \Session::flash(FlashHelper::SUCCESS, __('entity.entity').' '.__('resource.created'));
            return redirect()->route('entities.index');
        }
        \Session::flash(FlashHelper::ERROR, __('resource.saving').' '.__('errors.finished with errors'));

        return redirect()
            ->route('entities.index');
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
                'entity' => __('entities.entity')." $id ",
                'route' => route('entities.restore', ['id' => $id]),
            ])->render());
        } else {
            \Session::flash(FlashHelper::ERROR, __('resource.deleting')." #$id ".__('errors.finished with errors'));
        }

        return redirect()->route('entities.index');
    }

    public function restore($id) {
        if ($this->service->restore($id)) {
            \Session::flash(FlashHelper::SUCCESS, __('entity.entity')." #$id ".__('resource.restored'));
        } else {
            \Session::flash(FlashHelper::ERROR, __('resource.restoring')." #$id ".__('errors.finished with errors'));
        }

        return redirect()
            ->route('entities.index');
    }
}