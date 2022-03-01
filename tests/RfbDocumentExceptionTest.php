<?php 

use Tongedev\RfbDocument\Exceptions\RfbDocumentException;

it('should throw an exception for an invalid CPF during formatting', function (){
    $documentClass = new Tongedev\RfbDocument\CPFDocument();

    expect(fn() => $documentClass->format('12345adeffg'))
        ->toThrow(RfbDocumentException::class, 'The given document is invalid.');
})->group('cpf', 'formatting', 'exceptions');

it('should throw an exception for an invalid CPF during validation', function (){
    $documentClass = new Tongedev\RfbDocument\CPFDocument();

    expect(fn() => $documentClass->validate('12345adeffg'))
        ->toThrow(RfbDocumentException::class, 'The given document is invalid.');
})->group('cpf', 'validation', 'exceptions');

it('should throw an exception for an invalid CNPJ during formatting', function (){
    $documentClass = new Tongedev\RfbDocument\CNPJDocument();

    expect(fn() => $documentClass->format('12345adeffg'))
        ->toThrow(RfbDocumentException::class, 'The given document is invalid.');
})->group('cnpj', 'formatting', 'exceptions');

it('should throw an exception for an invalid CNPJ during validation', function (){
    $documentClass = new Tongedev\RfbDocument\CNPJDocument();

    expect(fn() => $documentClass->validate('12345adeffg'))
        ->toThrow(RfbDocumentException::class, 'The given document is invalid.');
})->group('cnpj', 'validation', 'exceptions');