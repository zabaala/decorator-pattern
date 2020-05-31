<?php

namespace App\Framework\Parser;

class TagManager
{
    /**
     * @var null
     */
    protected $tagObject = null;

    /**
     * @var string
     */
    private $tagName;

    /**
     * @var mixed
     */
    private $content;

    /**
     * A list of classes that use a PHP reserved keyword
     * and that must be replaced by a custom keyword.
     *
     * @var array
     */
    private $reserved = [
        'include' => 'customInclude'
    ];

    /**
     * Tags constructor.
     *
     * @param string $tagName
     * @param mixed $content
     */
    public function __construct($tagName, $content)
    {
        $tagName = strtolower($tagName);

        if (array_key_exists($tagName, $this->reserved)) {
            $tagName = $this->reserved[$tagName];
        }

        $this->tagName = TAG_NAMESPACE . ucwords($tagName);
        $this->content = $content;
    }

    /**
     * Get instance of a tag object.
     * I expected that decorator pattern occur here.
     *
     * @return null
     */
    public function getInstance()
    {
        $this->tagObject = new $this->tagName($this->content);
        return $this->tagObject;
    }

    /**
     * Get a tag content.
     *
     * @return mixed
     */
    public function content()
    {
        return $this->tagObject->content();
    }
}