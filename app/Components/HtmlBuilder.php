<?php

namespace SistemaTickets\Components;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder
{

    public function menu()
    {
         return view('partials.menu');
    }
}