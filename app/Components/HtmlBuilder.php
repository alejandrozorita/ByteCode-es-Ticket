<?php

namespace SistemaTickets\Components;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Routing\UrlGenerator;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder
{

	private $view;
	private $config;

	public function __construct(Config $config, View $view,UrlGenerator $url )
	{
		$this->config = $config;
		$this->view = $view;
		$this->url = $url;

	}

    public function menu($elementos)
    {
    	//En caso de pasar un elemento de tipo no array, cargamos el menú de la configuración
    	if (! is_array($elementos)) {
    		$elementos = $this->config->get($elementos, array());
    	}

        return $this->view->make('partials.menu', compact('elementos'));
    }



    /**
     * Contruir un atributis class de manera dinámica en HTML
     * 
     *  PAra ello usamos: 
     * {!! Hmlt::classes(['home' => true, 'main', 'dont-use-this' => false]) !!}
     * 
     * 
     * Returns:
     * class="home main".
     * 
     * @param array $classes
     * 
     * @return string
     * 
     */
    public function classes(array $classes)
    {
    	$html = '';

    	foreach ($classes as $name => $bool) {

    		if (is_int($name)) {
    			$name = $bool;
    			$bool = true;
    		}

    		if ($bool) {
    			$html .= $name . ' ';
    		}

    	}

    	if (! empty($html)) {
    		return ' class="' . trim($html). '"';
    	}

    	return '';
    }
}