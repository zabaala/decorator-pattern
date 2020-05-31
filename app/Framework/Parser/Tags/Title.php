<?php

namespace App\Framework\Parser\Tags;

class Title extends Tag
{
    /**
     * @inheritDoc
     */
    public function content()
    {
        return [
            'title' => $this->content[0]['value']
        ];
    }
}