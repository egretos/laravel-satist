<?php

namespace App\Http\Controllers;

use App\Helpers\FlashHelper;
use App\Http\Requests\Field\StoreField;
use App\Models\Entity;
use App\Services\FieldService;

class FieldController extends Controller
{
    /** @var FieldService $service */
    private $service;

    public function __construct(FieldService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function create($entity_id)
    {
        $entity = Entity::findOrFail($entity_id);

        return view('field.create', [
            'entity' => $entity,
        ]);
    }

    public function store(StoreField $request)
    {
        if ($this->service->store($request->all())) {
            \Session::flash(FlashHelper::SUCCESS, __('field.field').' '.__('resource.created'));
            return redirect()->route('entities.edit', ['entity_id' => $request->get('entity_id')]);
        }
        \Session::flash(FlashHelper::ERROR, __('resource.saving').' '.__('errors.finished with errors'));
        return redirect()->route('entities.edit', ['entity_id' => $request->get('entity_id')]);
    }

    public function destroy($entity_id, $id)
    {
        if ($this->service->delete($id)) {
            \Session::flash(FlashHelper::WARNING, __('field.field')." #$id ".__('resource.deleted'));
        } else {
            \Session::flash(FlashHelper::ERROR, __('resource.deleting')." #$id ".__('errors.finished with errors'));
        }

        return redirect()->route('entities.edit', ['id' => $entity_id]);
    }
}