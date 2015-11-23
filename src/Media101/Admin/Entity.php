<?php

namespace	Media101\Admin;

use Illuminate\Support\Str;

trait Entity
{
    protected $alias;

    //protected $model;

    /**
     * @return mixed
     */
//    public function model()
//    {
//        return $this->model;
//    }
//    /**
//     * Entity constructor.
//     * @param $alias
//     */
//    public function __construct()
//    {
//        $this->setDefaultAlias();
//    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    public function setDefaultAlias()
    {
        $alias = Str::snake(Str::plural(class_basename($this)));
        $this->alias = $alias;
    }

    public function formFields(){}


}