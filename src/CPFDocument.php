<?php

namespace Tongedev\RfbDocument;

final class CPFDocument extends Document
{
    protected int $size = 11;

    protected int $prefixSize = 9;

    protected string $format = '%s%s%s.%s%s%s.%s%s%s-%s%s';

    protected string $regexMatch = '/^[0-9]{11}$/i';

    protected array $prefixRange = [100000000, 999999999];

    protected array $weithedValues = [10, 9, 8, 7, 6, 5, 4, 3, 2];

    protected int $additionalWeith = 2;
}