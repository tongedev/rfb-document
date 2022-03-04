<?php

use Tongedev\RfbDocument\Facades\CPF;
use Tongedev\RfbDocument\Facades\CNPJ;
use Tongedev\RfbDocument\Tests\LaravelTestCase;

uses(LaravelTestCase::class);

it('should validate a CPF using facade')
    ->tap(fn() => $this->cpf = CPF::generate(true))
    ->expect(fn() => CPF::validate($this->cpf))
    ->toBeTrue();

it('should validate a CNPJ using facade')
    ->tap(fn() => $this->cnpj = CNPJ::generate(true))
    ->expect(fn() => CNPJ::validate($this->cnpj))
    ->toBeTrue();