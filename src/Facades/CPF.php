<?php

namespace Tongedev\RfbDocument\Facades;

use Illuminate\Support\Facades\Facade;

class CPF extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cpf';
    }
}