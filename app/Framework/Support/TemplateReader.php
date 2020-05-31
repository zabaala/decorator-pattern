<?php

namespace App\Framework\Support;

use App\Framework\Parser\TagManager;
use App\Framework\Support\FileSystem\FileReader;

class TemplateReader extends FileReader
{
    /**
     * @return mixed|\SimpleXMLElement
     * @throws FileSystem\FileReaderException
     */
    public function content()
    {
        $tags = simplexml_load_string($this->read());

        if (empty($tags)) {
            return null;
        }

        $content = [];

        foreach ($tags as $tag => $value) {
            $content[] = (new TagManager($tag, $value))->getInstance()->content();
        }

        return $content;
    }
}