<!-- start of weather widget -->

<div class="x_title">
            <h2>Tempo <small>Valinhos</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="temperature"><h2>{{ $currentlyTime }}</h2>
                        <span></span>
                        <span><b></b></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="weather-icon">
                        <canvas height="84" width="84" id="{{ $result->currently->icon }}"></canvas>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="weather-text">
                        <h2>Valinhos <br><i>{{ $result->currently->summary }}</i></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="weather-text pull-right">
                    <h1 class="degrees">{{ intval($result->currently->temperature) }}</h1>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row weather-days">
                <?php
                    $i=0;
                    foreach($result->daily->data as $object) {
                        $array = (array) $object;
                        setlocale(LC_TIME, 'pt_BR.utf8');
                        $ShortFormat = Carbon\Carbon::createFromTimestamp($array['time'])->formatLocalized('%a');
                        if (++$i == 1) continue;
                        if ($i == 8) break;
                    ?>
                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">{{ $ShortFormat }}</h2>
                        <h3 class="degrees">{{ intval($array['temperatureMax']) }}</h3>
                        <canvas class="{{ $array['icon'] }}" width="32" height="32"></canvas>
                        <h5>{{ intval($array['windSpeed']) }} <i>km/h</i></h5>
                    </div>
                </div>

               <?php } ?>

                <div class="clearfix"></div>
            </div>
        </div>