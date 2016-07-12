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
                    <div class="temperature"><b>{{ $titleday }}</b>, 07:30 AM
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
                    <h3 class="degrees">{{ $result->currently->temperature }}</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row weather-days">
                {{ $i = 0; }}
            @foreach($result['daily'] as $i => $v)
                {{
                if (++$i == 6) break;
                $TimeFormat = Carbon\Carbon::createFromTimestamp($v['time']);
                 switch ($TimeFormat->dayOfWeek){
                    case 0: $titleday2 = "Dom"; break;
                    case 1: $titleday2 = "Seg"; break;
                    case 2: $titleday2 = "Ter"; break;
                    case 3: $titleday2 = "Qua"; break;
                    case 4: $titleday2 = "Qui"; break;
                    case 5: $titleday2 = "Sex"; break;
                    case 6: $titleday2 = "Sáb"; break;
                 }
                 }}

                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">{{ $titleday2 }}</h2>
                        <h3 class="degrees">{{ $TimeFormat->day }}</h3>
                        <canvas id="{{ $v['icon'] }}" width="32" height="32"></canvas>
                        <h5>{{ $v['windSpeed'] }} <i>km/h</i></h5>
                    </div>
                </div>

                @endforeach

                <div class="clearfix"></div>
            </div>
        </div>