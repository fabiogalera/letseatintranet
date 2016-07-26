<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bem vindo,</span>
                <h2>{{ Auth::user()->name }}</h2>
                <small></small>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <br />
        <br />
        <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        @if (in_array(Auth::user()->role_id, [1, 2]))
                        <li><a><i class="fa fa-user"></i> Funcionários <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/funcionarios">Listar Funcionários <span class="label label-success">100%</span></a></li>
                                <li><a href="/funcionarios/create">Adicionar Funcionário <span class="label label-success">100%</span></a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-anchor"></i> Fornecedores <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/fornecedores">Listar Fornecedores <span class="label label-success">100%</span></a></li>
                                <li><a href="/fornecedores/create">Adicionar Fornecedores <span class="label label-success">100%</span></a></li>
                            </ul>

                        </li>
                        @endif

                        @if (in_array(Auth::user()->role_id, [1]))
                        <li><a><i class="fa fa-money"></i> Financeiro <span class="fa fa-chevron-down"></span> </a>
                            <ul class="nav child_menu">
                                <li><a href="/financeiro/plano">Plano Financeiro <span class="label label-danger">0%</span></a></li>
                                <li><a href="/cobranca">Cobrancas <span class="label label-default">45%</span></a></li>
                                <li><a href="/cobranca/create">Adicionar Cobranca <span class="label label-default">30%</span></a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-bar-chart-o"></i> Relatórios <span class="label label-danger">0%</span><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/relatorios">Vendas</a></li>
                                <li><a href="/relatorios">Fornecedores</a></li>
                                <li><a href="/relatorios/dre">Demonstartivo de Resultado</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-bar-chart-o"></i> Pedidos <span class="label label-danger">0%</span><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/pedido">Lista Pedido</a></li>
                                <li><a href="/pedido/add">Adicionar Pedido</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-bar-chart-o"></i> Estoque <span class="label label-danger">0%</span><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/estoque">Lista Estoque</a></li>
                                <li><a href="/estoque/add">Reportar Estoque</a></li>
                            </ul>
                        </li>
                        @endif


                    </ul>
                </div>

                <!-- sidebar menu -->
                    <div class="menu_section">
                        <h3>Ferramentas</h3>
                        <ul class="nav side-menu">
                            <li><a href="/voucher"><i class="fa fa-tags"></i> Voucher <span class="label label-default">80%</span></a> </li>
                            <li><a href="/espera"><i class="fa fa-users"></i> Espera <span class="label label-danger">0%</span></a> </li>
                            @if (in_array(Auth::user()->role_id, [1, 2]))
                            <li><a href="/fechamento"><i class="fa fa-archive"></i> Fechamento <span class="label label-default">60%</span></a> </li>
                            @endif
                        </ul>
                    </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>