<?php

it('should sanitize a given CNPJ document number', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $sanitizedCNPJ = $documentClass->sanitize('12.345.678/9012-34');

    expect($sanitizedCNPJ)->toBe('12345678901234');
});

it('should format a given CNPJ document number', function () {
    $documentClass = new \Tongedev\RfbDocument\CNPJDocument();

    $formattedCNPJ = $documentClass->format('12345678901234');

    expect($formattedCNPJ)->toBe('12.345.678/9012-34');
});