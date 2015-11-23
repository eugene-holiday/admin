<?php

namespace Media101\Admin\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($entity)
    {
        $entities = $entity::all();
        $entityModel = $entity;
        return view('admin::admin.entities.index', compact('entities', 'entityModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($entity)
    {

        return view('admin::admin.entities.create', compact('entity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($entity, Request $request)
    {
        $validator = Validator::make($request->all(), $entity->validationRules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $item = new $entity($request->except(['_method', '_token']));
        $item->save();
        return redirect()->route('admin.entity.index', $entity->getAlias());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($entity, $id)
    {
        $entity = $entity::find($id);
        return view('admin::admin.entities.show', compact('entity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($entity, $id)
    {
        $entity = $entity::find($id);
        return view('admin::admin.entities.edit', compact('entity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($entity, Request $request, $id)
    {
        $validator = Validator::make($request->all(), $entity->validationRules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $model = $entity::find($id);
        $model->update($request->all());
        return redirect()->route('admin.entity.index', [$entity->getAlias()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($entity, $id)
    {
        $model = $entity::find($id);
        $model->delete();
        return redirect()->route('admin.entity.index', [$entity->getAlias()]);
    }
}
