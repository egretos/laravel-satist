<?php

namespace App\Http\Controllers;

use App\Helpers\FlashHelper;
use App\Http\Requests\Type\StoreType;
use App\Models\Type;
use Illuminate\Database\QueryException;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = Type::all();

        return view('type.index')
            ->with(compact('types'));
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(StoreType $request)
    {
        $type = new Type($request->all());

        try {
            if (!$type->save()) {
                \Session::flash(FlashHelper::ERROR, __('resource.saving') . ' ' . __('errors.finished with errors'));

                return redirect()
                    ->route('types.index');
            }
        } catch (QueryException $exception) {
            \Log::error($exception);
            \Session::flash(FlashHelper::ERROR, __('resource.saving') . ' ' . __('errors.finished with errors'));

            return redirect()
                ->route('types.index');
        }

        \Session::flash(FlashHelper::SUCCESS, __('type.type').' "'.$type.'" '.__('resource.created'));

        return redirect()
            ->route('types.index');
    }

    public function destroy($id)
    {
        $type = Type::find($id);

        if ($type && $type->delete()) {
            \Session::flash(FlashHelper::WARNING,
                __('type.type')." \"{$type}\" ".__('resource.deleted') . '. <a href="'.route('types.restore', ['id' => $id]).'">'.__('resource.restore').'?</a>');
        } else {
            \Session::flash(FlashHelper::ERROR, __('resource.deleting') . ' #' . $id . ' ' . __('errors.finished with errors'));
        }

        return redirect()
            ->route('types.index');
    }

    public function restore($id) {
        $type = Type::withTrashed()->find($id);

        if ($type && $type->restore()) {
            \Session::flash(FlashHelper::SUCCESS,
                __('type.type')." \"{$type}\" ".__('resource.restored'));
        } else {
            \Session::flash(FlashHelper::ERROR, __('resource.restoring') . ' #' . $id . ' ' . __('errors.finished with errors'));
        }

        return redirect()
            ->route('types.index');
    }
}