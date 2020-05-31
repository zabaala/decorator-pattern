<?php

namespace App\Framework\Parser\Contracts;

interface TagObjectInterface
{
    public function __construct($content);
    public function content();
}