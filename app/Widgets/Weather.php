<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use GuzzleHttp\Client;


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
        return "<i class=\"fa fa-spinner fa-spin fa-3x fa-fw\"></i>
                <span class=\"sr-only\">Loading...</span>";
    }

    public function run()
    {
        $client = new Client();

        $key = 'ae300dcfd8fa70066081dd0765e4fc69';
        $loc = '-22.9816458,-47.0126948';

        $request = $client->get('https://api.forecast.io/forecast/'. $key . '/' . $loc . '/?lang=pt')->getBody();

        $obj = json_decode($request);

        dd($obj);

        return view("widgets.weather", ['config' => $this->config, 'result' => $obj]);
    }
}