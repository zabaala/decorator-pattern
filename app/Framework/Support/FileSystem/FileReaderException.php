<?php

namespace App\Framework\Support\FileSystem;

class FileReaderException extends \Exception
{
    /**
     * @var string
     */
    private $filename;

    /**
     * FileReaderException constructor.
     *
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
        parent::__construct("File {$this->filename} not found.");
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }
}