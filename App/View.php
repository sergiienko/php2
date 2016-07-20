<?php

namespace App;

class View implements \Countable
{
    use Accessor;

    /**
     * @var string Path to the directory where templates are stored.
     */
    protected $path = APP_ROOT . '/App/templates';

    /**
     * @var string Extension of a template file.
     */
    protected $extension = 'php';

    /**
     * Render a template.
     *
     * @param string $template
     *
     * @return string
     */
    public function render($template)
    {
        foreach ($this->data as $property => $value) {
            $$property = $value;
        }

        ob_start();
        include $this->path . '/' . 'layout' . '.' . $this->extension;
        $layout = ob_get_clean();

        ob_start();
        include $this->path . '/' . $template . '.' . $this->extension;
        $content = ob_get_clean();

        return str_replace('{{ content }}', $content, $layout);
    }

    /**
     * Display a template.
     *
     * @param $template
     *
     * @return void
     */
    public function display($template)
    {
        echo $this->render($template);
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
