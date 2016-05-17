<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 13/05/2016
 * Time: 23:29
 */

namespace SISAC\Validators;


use Prettus\Validator\LaravelValidator;

class CursoValidator extends LaravelValidator
{
    protected $rules = [
        'descricao' => 'required|max:255',
        'horas_atividades' => 'required'
    ];
}