<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
           <ul class="nav navbar-nav pull-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->avatar }}" alt="">{{ Auth::user()->name }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li><a href="/logoff"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="">
                    <a href="javascript:;" class="" data-toggle="dropdown" aria-expanded="false">
                        Franqueado <span class="label label-danger">{{ session()->get('franqueado')[0]->identificador}}</span>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-left">
                        <li><a href="/franqueado/1"><i class="fa fa-sign-out pull-right"></i> Valinhos</a></li>
                        <li><a href="/franqueado/2"><i class="fa fa-sign-out pull-right"></i> Indaiatuba</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->