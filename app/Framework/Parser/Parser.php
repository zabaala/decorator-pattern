<?php

namespace App\Framework\Parser;

use App\Framework\Support\FileSystem\FileReader;

class Parser
{
    /**
     * @var string
     */
    private $templateFile;

    /**
     * @var FileReader
     */
    private $reader;

    /**
     * TagParser constructor.
     * @param string $templateFile
     * @param FileReader $reader
     */
    public function __construct(string $templateFile, FileReader $reader)
    {
        $this->templateFile = $templateFile;
        $this->reader = $reader;
    }

    /**
     * Parse content of PFXML file.
     *
     * @return array
     */
    public function parse()
    {
        return $this
            ->reader
            ->setFilename($this->templateFile)
            ->content();
    }
}