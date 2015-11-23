<?php

namespace	Media101\Admin;

use Illuminate\Support\Str;

trait Entity
{
    protected $alias;

    protected $columns;


    protected $notInFormItems = ['id', 'created_at', 'updated_at', 'password', 'remember_token'];

    protected $mapping = [
        'varchar' => 'text',
        'text'    => 'textarea',
        'datetime' => 'time',
        'timestamp' => 'timestamp',
        'double'   =>  'text',
    ];

    /**
     * @param mixed $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        if($this->alias == null){
            $this->setDefaultAlias();
        }
        return $this->alias;
    }

    public function setDefaultAlias()
    {
        if(!$this->_alias) {
            $alias = Str::snake(Str::plural(class_basename($this)));
            $this->alias = $alias;
        } else {
            $this->alias = $this->_alias;
        }
    }

    public function formFields(){
        $fields = [];
        foreach($this->getTableColumns() as $column){
            if(!array_intersect((array)$column->Field, $this->notInFormItems)) {
                $name = $column->Field;
                $rawType = explode('(', $column->Type);
                $type = $this->mapping[array_shift($rawType)];
                //$required = $column->Null == 'NO'?false: true;
                $label = $name;
                $item =  ['type' => $type, 'name' => $name, 'value' =>  $this->$name , 'required' => false, 'description' => false, 'label' => $label];
                if($type == 'timestamp'){
                    $item['pickerFormat'] = 'd.m.Y';
                    $item['seconds'] = false;
                }
                $fields[] = $item;
            }
        }
        return $fields;
    }

    public function columns()
    {
        $columns = [];
        foreach($this->getTableColumns() as $column){
            if(!array_intersect((array)$column->Field, $this->notInFormItems)) {
                $name = $column->Field;
                $rawType = explode('(', $column->Type);
                $type = $this->mapping[array_shift($rawType)];
                $label = $name;
                if($type == 'text') {
                    $item = ['name' => $name, 'value' => $this->$name, 'label' => $label];
                    $columns[] = $item;
                }
            }
        }
        return $columns;
    }

    public function getTableColumns() {

        if($this->columns == null)
            $this->columns = \DB::select( \DB::raw('SHOW COLUMNS FROM `'.$this->getTable().'`'));
        return $this->columns;
    }


}