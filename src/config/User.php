<?php


namespace App\Admin;

use Media101\Admin\Entity;
use Media101\Admin\EntityInterface;

class User extends \App\User implements EntityInterface
{
    use Entity;

    protected $_alias = 'users2';

    protected $fillable = ['name', 'email'];

    public $validationRules = [
        //'name' => 'max:4'
    ];


    public function columns()
    {
        return [
            ['label' => 'Имя', 'value' => $this->name],
            ['label' => 'Почта', 'value' => $this->email]
        ];
    }

    public function formFields(){
        return [
            ['type' => 'text', 'required' => true, 'description' => 'bla bla', 'value' => $this->title, 'name' => 'title', 'label' => 'Заголовок']
        ];
    }
}