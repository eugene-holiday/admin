<?php

namespace Media101\Admin\Http\Controllers;


use App\Domain\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Media101\Admin\Entity;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($entity)
    {
        $model = $entity->model();
        dd($model::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Entity $entity, $id)
    {
        $model = $entity->model();
        $entity = $model::find($id);
        return view('admin::admin.entities.show', compact('entity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Entity $entity, $id)
    {
        $modelClass = $entity->model();
        $model = $modelClass::find($id);
        return view('admin::admin.entities.edit', compact('entity', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Entity $entity, Request $request, $id)
    {
        $modelClass = $entity->model();
        $model = $modelClass::find($id);
        $model->update($request->all());
        //return redirect()->to('admin::admin.entities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
