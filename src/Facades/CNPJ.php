<?php

namespace Tongedev\RfbDocument\Facades;

use Illuminate\Support\Facades\Facade;

class CNPJ extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cnpj';
    }
}