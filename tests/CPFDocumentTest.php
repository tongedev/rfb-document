<?php


it('should generate a sanitized CPF', function () {
    $documentClass = new \Tongedev\RfbDocument\CPFDocument();

    $generatedCPF = $documentClass->generate();

    expect($generatedCPF)->toMatch('/^[0-9]{11}$/i');
})->group('cpf', 'generation');

it('should generate a formatted CPF', function () {
    $documentClass = new \Tongedev\RfbDocument\CPFDocument();

    $generatedCPF = $documentClass->generate(true);

    expect($generatedCPF)->toMatch('/^[0-9]{3}(\.?[0-9]{3}){2}\-?[0-9]{2}$/i');
})->group('cpf', 'generation');

it('should sanitize a given CPF', function () {
   $documentClass = new \Tongedev\RfbDocument\CPFDocument();

   $sanitizedCPF = $documentClass->sanitize('123.456.789-10');

    expect($sanitizedCPF)->toBe('12345678910');
})->group('cpf', 'sanitization');	

it('should format a given CPF', function () {
    $documentClass = new \Tongedev\RfbDocument\CPFDocument();

    $formattedCPF = $documentClass->format('12345678910');

    expect($formattedCPF)->toBe('123.456.789-10');
})->group('cpf', 'formatting');

it('should invalidate a wrong sanitized CPF', function () {
    $documentClass = new \Tongedev\RfbDocument\CPFDocument();

    $validatedCPF = $documentClass->validate('65789602111');

    expect($validatedCPF)->toBeFalse();
})->group('cpf', 'validation');

it('should validate a right sanitized CPF', function () {
    $documentClass = new \Tongedev\RfbDocument\CPFDocument();

    $cpf = $documentClass->generate();

    $validatedCPF = $documentClass->validate($cpf);

    expect($validatedCPF)->toBeTrue();
})->group('cpf', 'validation');

it('should invalidate a wrong formatted CPF', function () {
    $documentClass = new \Tongedev\RfbDocument\CPFDocument();

    $validatedCPF = $documentClass->validate('657.896.021-11');

    expect($validatedCPF)->toBeFalse();

})->group('cpf', 'validation');

it('should validate a right formatted CPF', function () {
    $documentClass = new \Tongedev\RfbDocument\CPFDocument();

    $cpf = $documentClass->generate(true);

    $validatedCPF = $documentClass->validate($cpf);

    expect($validatedCPF)->toBeTrue();
})->group('cpf', 'validation');
