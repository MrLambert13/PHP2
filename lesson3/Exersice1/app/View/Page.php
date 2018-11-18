<?php

namespace App\View;

use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;

class Page
{
    private $twig;
    private $template;

    public function __construct(string $template) {
        $loader = new Twig_Loader_Filesystem(
            'views'
        );

        $this->twig = new Twig_Environment($loader, [
            'debug' => true,
        ]);
        $this->twig->addExtension(new Twig_Extension_Debug());

        $this->template = $template.'.twig';
    }

    /**
     * @param array $data
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render(array $data) {
        return $this->twig->render(
            $this->template,
            $data
        );
    }
}