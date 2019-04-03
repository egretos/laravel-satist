<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreType;
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
                \Session::flash('success', __('resource.saving') . ' ' . __('errors.finished with errors'));

                return redirect()
                    ->route('types.index');
            }
        } catch (QueryException $exception) {
            \Log::error($exception);
            \Session::flash('success', __('resource.saving') . ' ' . __('errors.finished with errors'));

            return redirect()
                ->route('types.index');
        }

        \Session::flash('success', __('type.type').'#'.$type);

        return redirect()
            ->route('types.index');
    }
}