<?php


it('should generate a sanitized CPF')
    ->group('cpf', 'generation')
    ->expect(fn () => cpf()->generate())->toMatch('/^[0-9]{11}$/i');

it('should generate a formatted CPF')
    ->group('cpf', 'generation')
    ->expect(fn () => cpf()->generate(true))
    ->toMatch('/^[0-9]{3}(\.?[0-9]{3}){2}\-?[0-9]{2}$/i');

it('should sanitize a given CPF')
    ->group('cpf', 'sanitization')
    ->expect(fn () => cpf()->sanitize('123.456.789-10'))
    ->toBe('12345678910');

it('should format a given CPF')
    ->group('cpf', 'formatting')
    ->expect(fn () => cpf()->format('12345678910'))
    ->toBe('123.456.789-10');

it('should invalidate a wrong sanitized CPF')
    ->group('cpf', 'validation')
    ->expect(fn () => cpf()->validate('65789602111'))
    ->toBeFalse();

it('should validate a properly sanitized CPF')
    ->group('cpf', 'validation')
    ->tap(fn () => $this->cpf = cpf()->generate())
    ->expect(fn () => cpf()->validate($this->cpf))
    ->toBeTrue();


it('should invalidate a wrong formatted CPF')
    ->group('cpf', 'validation')
    ->expect(fn () => cpf()->validate('657.896.021-11'))
    ->toBeFalse();

it('should validate a right formatted CPF')
    ->group('cpf', 'validation')
    ->tap(fn () => $this->cpf = cpf()->generate(true))
    ->expect(fn () => cpf()->validate($this->cpf))
    ->toBeTrue();
