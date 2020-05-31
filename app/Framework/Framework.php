<?php

namespace App\Framework;

use App\Framework\Parser\Parser;

class Framework
{
    public function parse($fileTemplate, $reader)
    {
        return (new Parser($fileTemplate, $reader))->parse();
    }
}