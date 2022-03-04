<?php

use Tongedev\RfbDocument\Exceptions\RfbDocumentException;

it('should throw an exception for an invalid CPF during formatting')
    ->group('cpf', 'formatting', 'exceptions')
    ->expect(fn () => cpf()->format('12345adeffg'))
    ->throws(RfbDocumentException::class, 'The given document is invalid.');

it('should throw an exception for an invalid CPF during validation')
    ->group('cpf', 'validation', 'exceptions')
    ->expect(fn () => cpf()->validate('12345adeffg'))
    ->throws(RfbDocumentException::class, 'The given document is invalid.');

it('should throw an exception for an invalid CNPJ during formatting')
    ->group('cnpj', 'formatting', 'exceptions')
    ->expect(fn () => cnpj()->format('12345adeffg'))
    ->throws(RfbDocumentException::class, 'The given document is invalid.');

it('should throw an exception for an invalid CNPJ during validation')
    ->group('cnpj', 'validation', 'exceptions')
    ->expect(fn () => cnpj()->validate('12345adeffg'))
    ->throws(RfbDocumentException::class, 'The given document is invalid.');
