<?php

namespace Phion\Phequel;

abstract class AbstractExpression
{

    /* @var Format $formatter */
    private $formatter;

    /**
     * @return string
     */
    abstract public function toString();

    /**
     * @return array
     */
    public function getParams()
    {
        return [];
    }

    /**
     * @param Format|null $formatter
     * @return Format
     * @throws \Exception
     */
    public function format(Format $formatter = null)
    {
        if ($formatter instanceof Format) {
            return $this->formatter = $formatter;
        }
        elseif ($this->formatter instanceof Format) {
            return $this->formatter;
        }
        else {
            return $this->formatter = new Format($this);
        }
    }

    /**
     * @param $continue
     * @param array $components
     * @return string
     */
    protected function compose($continue, array $components)
    {
        if (!$continue) {
            return '';
        }
        $ret = '';
        $formatter = $this->format();

        foreach ($components as &$component) {
            if ($component instanceof AbstractExpression) {
                $component->format($formatter);
                $ret .= $component->toString();
            }
            else if (is_string($component)) {
                $ret .= $component;
            }
            else if (is_array($component)) {
                $ret .= $formatter->insert(
                    $component[0],
                    $component[1] ?? null,
                    $component[2] ?? Format::spacing_default,
                    $component[3] ?? true
                );
            }
        }
        return $ret;
    }

}
