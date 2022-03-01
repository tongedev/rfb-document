<?php

namespace Tongedev\RfbDocument;

class CNPJDocument extends Document
{
   protected int $size = 14;
   
    protected int $prefixSize = 12;

    protected string $format = '%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s';

    protected string $regexMatch = '/^[0-9]{14}$/i';

    protected array $prefixRange = [100000000000, 999999999999];

    protected array $weithedValues = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

    protected int $additionalWeith = 6;
}