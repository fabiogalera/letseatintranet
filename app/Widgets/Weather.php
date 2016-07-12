<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Weather extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'use_jquery_for_ajax_calls' => true,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */

    public function placeholder()
    {
        return "<i class=\"fa fa-circle-o-notch fa-spin fa-3x fa-fw\"></i>
                    <span class=\"sr-only\">Loading...</span>";
    }

    public function container()
    {
        return [
            'element'       => 'div',
            'attributes'    => 'class="arrilot-widget-container"',
        ];
    }

    public function run()
    {
        //

        return view("widgets.weather", [
            'config' => $this->config,
        ]);
    }
}