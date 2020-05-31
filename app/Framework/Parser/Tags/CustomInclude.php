<?php

namespace App\Framework\Parser\Tags;

class CustomInclude extends Tag
{
    public function content()
    {
        return  __include($this->content);
    }
}