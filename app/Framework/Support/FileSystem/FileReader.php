<?php

namespace App\Framework\Support\FileSystem;

abstract class FileReader
{
    /**
     * @var string
     */
    protected $filename = null;

    /**
     * @var string
     */
    protected $content;

    /**
     * FileReader constructor.
     * @param $filename
     */
    public function __construct(string $filename = null)
    {
        $this->filename = $filename;
    }

    /**
     * @param $file
     * @param bool $throw
     * @return bool
     * @throws FileReaderException
     */
    private function fileExists($file, $throw = true)
    {
        $ok = file_exists($file);

        if ($throw && !$ok) {
            throw (new FileReaderException($file));
        }

        return $ok;
    }

    /**
     * @param $file
     * @return false|string
     * @throws FileReaderException
     */
    protected function read()
    {
        $this->fileExists($this->filename);

        $resource = fopen($this->filename, 'r');
        $content = fread($resource, filesize($this->filename));
        fclose($resource);

        return $this->content = $content;
    }

    /**
     * Set path of a file that will be parsed.
     *
     * @param $filename
     * @return FileReader
     */
    public function setFilename(string $filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * Get content from file.
     * This method allow the system parses the content based in the expected content type.
     *
     * @return mixed
     */
    public abstract function content();
}