<?php

it('should generate a sanitized CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $generatedCNPJ = $documentClass->generate();

    expect($generatedCNPJ)->toMatch('/^[0-9]{14}$/i');
})->group('cnpj', 'generation');

it('should generate a formatted CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $generatedCNPJ = $documentClass->generate(true);

    expect($generatedCNPJ)->toMatch('/^[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2}$/i');
})->group('cnpj', 'generation');

it('should sanitize a given CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $sanitizedCNPJ = $documentClass->sanitize('12.345.678/9012-34');

    expect($sanitizedCNPJ)->toBe('12345678901234');
})->group('cnpj', 'sanitization');

it('should format a given CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $formattedCNPJ = $documentClass->format('12345678901234');

    expect($formattedCNPJ)->toBe('12.345.678/9012-34');
})->group('cnpj', 'formatting');

it('should invalidate a wrong sanitized CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $validatedCNPJ = $documentClass->validate('12345678901234');

    expect($validatedCNPJ)->toBeFalse();
})->group('cnpj', 'validation');

it('should validate a right sanitized CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $cnpj = $documentClass->generate();

    $validatedCNPJ = $documentClass->validate($cnpj);

    expect($validatedCNPJ)->toBeTrue();
})->group('cnpj', 'validation');

it('should invalidate a wrong formatted CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $validatedCNPJ = $documentClass->validate('12.345.678/9012-34');

    expect($validatedCNPJ)->toBeFalse();
})->group('cnpj', 'validation');

it('should validate a right formatted CNPJ', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $cnpj = $documentClass->generate(true);

    $validatedCNPJ = $documentClass->validate($cnpj);

    expect($validatedCNPJ)->toBeTrue();
})->group('cnpj', 'validation');