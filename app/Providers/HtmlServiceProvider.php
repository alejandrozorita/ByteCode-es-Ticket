<?php

namespace SistemaTickets\Providers;

use Collective\Html\HtmlServiceProvider as CollectiveHtmlServiceProvider;
use SistemaTickets\Components\HtmlBuilder;


class HtmlServiceProvider extends \Collective\Html\HtmlServiceProvider
{
    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->bindShared('html', function($app)
        {
            return new HtmlBuilder($app['config'], $app['view'], $app['url']);
        });
    }
}