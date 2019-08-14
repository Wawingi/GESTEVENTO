@extends('home')
@section('content')
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"> GESTEVENTO !!!</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Administração</li>
                                        <li class="breadcrumb-item active"><a href="{{ url('listar') }}">Listar Eventos</a></li>
                                        <li class="breadcrumb-item active">Ver Assento</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                                <div class="col-12">
                                    <div style="height:265px" class="card-box widget-user">
                                        <div>
                                            <?php if($assento->tipo == 'Mesa'){ ?>
                                                <img style="width:150px;height:150px" src="{{ asset('images/mesa.jpg') }}" class="img-responsive rounded-circle" alt="user">
                                            <?php } else { ?>
                                                <img style="width:150px;height:150px" src="{{ asset('images/cadeira.png') }}" class="img-responsive rounded-circle" alt="user">
                                            <?php } ?>
                                            <div class="row">
                                                <div style="margin-top:5px" class="col-5">
                                                    <div class="wid-u-info">
                                                        <h3 class="mt-0 m-b-8 font-25">Designação</h3>
                                                        <h4><p class="text-muted m-b-5 font-20">Tipo</p></h4>
                                                        <h4><p><b>Capacidade</b></p></h4>
                                                    </div>
                                                </div>
                                                <div style="margin-top:5px;margin-left:-250px" class="col-6">
                                                    <div class="wid-u-info">
                                                        <h3 class="mt-0 m-b-8 font-25">: <?php echo $assento->designacao ?></h3>
                                                        <h4><p class="text-muted m-b-5 font-20">: <?php echo $assento->tipo ?></p></h4>
                                                        <h4><p><b>: <?php echo $assento->capacidade ?></b></p></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-top:-20px" class="row">
                                                <div style="margin-left:90px" class="col-sm-5 m-t-20">   
                                                    <small class="text-success"><b>Ocupação do Assento</b></small>
                                                    <?php if($assento->tipo=='Cadeira'){ ?>  
                                                        <div class="progress progress-md m-b-20">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($cont_elementos_mesa*100)/$assento->capacidade ?>%"><?php if($cont_elementos_mesa>0){ echo 'LUGAR JÁ OCUPADO'; } ?></div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="progress progress-md m-b-20">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($cont_elementos_mesa*100)/$assento->capacidade ?>%"><?php echo ($cont_elementos_mesa*100)/$assento->capacidade ?>%</div>
                                                            
                                                        </div>                    
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <!-- Importação da Modal Assento -->
                                            @include('modalconvidado')
                                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalconvidado">
                                                <i class='fa  fa-plus-square'></i> Inserir Convidado
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                        <!-- Listar convidados -->
                        <div class="row">
                            <div class="col-12">
                                <div  class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <h4 style="text-align:center"><b>CONVIDADOS ASSOCIADOS A ESTA MESA</b></h4>   
                                      
                                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">#</th>
                                            <th style="text-align: center">Nome</th>
                                            <th style="text-align: center">Genero</th>
                                            <th style="text-align: center">Estado</th>
                                            <th style="text-align: center">Acompanhante(s)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $convidados = App\Model\Convidado::where('id_assento', '=', $assento->id)->paginate(15); 
                                            $loop=0;
                                            foreach($convidados as $convidado):
                                        ?>
                                            <tr>
                                                <td style="text-align: center">
                                                    
                                                </td>
                                                <td style="text-align: center">{{ $convidado->nome }}</td>
                                                <td style="text-align: center">{{ $convidado->genero }}</td>
                                                <td style="text-align: center">{{ $convidado->estado }}</td>
                                                <td style="text-align: center;word-spacing: 10px">
                                                    <?php 
                                                        $convidados = App\Model\Acompanhante::where('id_convidado', '=', $convidado->id)->paginate(15); 
                                                        //echo $convidados[0]->nome;
                                                        //foreach($convidados as $convidado):
                                                    ?>    
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
@stop