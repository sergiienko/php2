<?php

namespace App;

class View implements \Countable
{
    use Accessor;

    public function render($template)
    {
        ob_start();

        foreach ($this->data as $property => $value) {
            $$property = $value;
        }

        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function display($template)
    {
        foreach ($this->data as $property => $value) {
            $$property = $value;
        }
        echo str_replace('{{ content }}', $this->render($template), $this->render(__DIR__ . '/templates/layout.php'));
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }
}
