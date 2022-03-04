<?php

it('should generate a sanitized CNPJ')
    ->group('cnpj', 'generation')
    ->expect(fn () => cnpj()->generate())
    ->toMatch('/^[0-9]{14}$/i');

it('should generate a formatted CNPJ')
    ->group('cnpj', 'generation')
    ->expect(fn () => cnpj()->generate(true))
    ->toMatch('/^[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2}$/i');

it('should sanitize a given CNPJ')
    ->group('cnpj', 'sanitization')
    ->expect(fn () => cnpj()->sanitize('12.345.678/9012-34'))
    ->toBe('12345678901234');

it('should format a given CNPJ')
    ->group('cnpj', 'formatting')
    ->expect(fn () => cnpj()->format('12345678901234'))
    ->toBe('12.345.678/9012-34');

it('should invalidate a wrong sanitized CNPJ')
    ->group('cnpj', 'validation')
    ->expect(fn () => cnpj()->validate('12345678901234'))
    ->toBeFalse();

it('should validate a properly sanitized CNPJ')
    ->group('cnpj', 'validation')
    ->tap(fn () => $this->cnpj = cnpj()->generate())
    ->expect(fn () => cnpj()->validate($this->cnpj))
    ->toBeTrue();

it('should invalidate a wrong formatted CNPJ')
    ->group('cnpj', 'validation')
    ->expect(fn () => cnpj()->validate('12.345.678/9012-34'))
    ->toBeFalse();

it('should validate a right formatted CNPJ')
    ->group('cnpj', 'validation')
    ->tap(fn () => $this->cnpj = cnpj()->generate(true))
    ->expect(fn () => cnpj()->validate($this->cnpj))
    ->toBeTrue();
