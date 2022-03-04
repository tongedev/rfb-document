<?php

use Tongedev\RfbDocument\CPFDocument;
use Tongedev\RfbDocument\CNPJDocument;

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

function cnpj(): CNPJDocument
{
    return new CNPJDocument();
}

function cpf(): CPFDocument
{
    return new CPFDocument();
}
