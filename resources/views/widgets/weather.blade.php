<!-- start of weather widget -->
<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel">
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
                    <div class="temperature"><b>Segunda-Feira</b>, 07:30 AM
                        <span></span>
                        <span><b></b></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="weather-icon">
                        <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="weather-text">
                        <h2>Valinhos <br><i>Parcialmente nublado</i></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="weather-text pull-right">
                    <h3 class="degrees">23</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row weather-days">
                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">Seg</h2>
                        <h3 class="degrees">25</h3>
                        <canvas id="clear-day" width="32" height="32"></canvas>
                        <h5>15 <i>km/h</i></h5>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">Ter</h2>
                        <h3 class="degrees">25</h3>
                        <canvas height="32" width="32" id="rain"></canvas>
                        <h5>12 <i>km/h</i></h5>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">Qua</h2>
                        <h3 class="degrees">27</h3>
                        <canvas height="32" width="32" id="snow"></canvas>
                        <h5>14 <i>km/h</i></h5>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">Qui</h2>
                        <h3 class="degrees">28</h3>
                        <canvas height="32" width="32" id="sleet"></canvas>
                        <h5>15 <i>km/h</i></h5>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">Sex</h2>
                        <h3 class="degrees">28</h3>
                        <canvas height="32" width="32" id="wind"></canvas>
                        <h5>11 <i>km/h</i></h5>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="daily-weather">
                        <h2 class="day">Sab</h2>
                        <h3 class="degrees">26</h3>
                        <canvas height="32" width="32" id="cloudy"></canvas>
                        <h5>10 <i>km/h</i></h5>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>
<!-- end of weather widget -->