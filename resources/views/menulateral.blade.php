            <!-- ========== Inicio Menu Lateral ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Inicio</li>

                            <li>
                                <a href="{{ url('/') }}" class="waves-effect waves-primary"><i class="fas fa-home"></i><span> Página Inicial </span></a>
                            </li>
            
                                <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fas fa-cogs"></i> <span> Administração </span>
                                            <span class="menu-arrow"></span></a>
                                            <ul class="list-unstyled">
                                                <li><a href="{{ url('inserir') }}">Registar Convidado</a></li>
                                                <li><a href="{{ url('listar') }}">Listar Convidados</a></li>                                                              
                                            </ul>
                                </li>
                           
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fas fa-bar-chart-o"></i>
                                    <span> Estatística </span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="../estatistica?categoria=<?php echo base64_encode('Ensino Superior') ?>">Ensino Superior</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Fim menu lateral -->