<?php

namespace App\Framework\Parser\Tags;

abstract class Tag
{
    /**
     * @var mixed
     */
    protected $content;

    /**
     * Title constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public abstract function content();
}