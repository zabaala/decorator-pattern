<?php

namespace App\Framework\Parser\Tags;

use App\Framework\FrameworkException;

class Calc extends Tag
{
    /**
     * A simple approach to map a arithmetic operation defined into XML to a real method.
     *
     * @var array
     */
    protected $operationMap = [
        'sum' => 'sumCaller'
    ];

    /**
     * @return array|void
     * @throws FrameworkException
     */
    public function content()
    {
        $content = [];

        foreach ($this->content[0] as $key => $value) {
            $key = strtolower($key);

            if (
                ! array_key_exists($key, $this->operationMap) ||
                ! method_exists($this, $this->operationMap[$key])
            ) {
                throw new FrameworkException(
                    "Method '{$this->operationMap[$key]}' must be implemented into Calc class."
                );
            }

            $content[] = $this->{$this->operationMap[$key]}($value);
        }

        return $content;
    }

    /**
     * @param $value
     * @return array
     * @throws FrameworkException
     */
    private function sumCaller($value)
    {
        $a = (int) $value->FIRST;
        $b = (int) $value->SECOND;

        if (empty($a) || empty($b)) {
            throw new FrameworkException(
                "FIRST and SECOND tag must be present into SUM tag and be a integer."
            );
        }

        return [
            'values' => [
                'fist' => $a,
                'second' => $b
            ],
            'operation' => 'sum',
            'result' => ($a + $b)
        ];
    }
}