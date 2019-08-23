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
                                    <h4 class="page-title">GESTEVENTO !!!</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Administração</li>
                                        <li class="breadcrumb-item active"><a href="{{ url('listar') }}">Listar Eventos</a></li>
                                        <li class="breadcrumb-item active">Ver Evento</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if(session('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Alerta!</strong>
                                {{ session('info')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if(session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Alerta!</strong>
                                {{ session('warning')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        
                        <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Entidade</label>
                                                    <input  type="text" style="font-weight:bold" class="form-control" readonly="" value="<?php echo $evento->entidade ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Local</label>
                                                    <input  type="text" style="font-weight:bold" class="form-control" readonly="" value="<?php echo $evento->local ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Tipo</label>
                                                    <input  type="text" style="font-weight:bold" class="form-control" readonly="" value="<?php echo $evento->tipo ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Data</label>
                                                    <input  type="text" style="font-weight:bold" class="form-control" readonly="" value="<?php echo $evento->data ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Hora</label>
                                                    <input  type="text" class="form-control" style="font-weight:bold" readonly="" value="<?php echo $evento->hora ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Importação da Modal Assento -->
                                        @include('modalassento')
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalevento">
                                            <i class='fa  fa-plus-square'></i> Inserir Assento
                                        </button>
                                        <a href='{{ url("/eventoPDF/") }}' class="btn btn-secondary">
                                            <i class='fa fa-file-pdf-o'></i> Ver PDF
                                        </a>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            //DB::table('users')->where('name', 'John')->value('email');
                           
                            
                            
                        ?>
                        <!-- Listagem dos assentos -->
                        <div class="row">
                            <?php 
                                 $assentos = App\Model\Assento::where('id_evento', '=', $evento->id)->paginate(15); 
                                 foreach($assentos as $assento):
                            ?>
                                <div class="col-sm-3 col-md-3 col-xs-8">
                                    <div style="width:230px;margin-left:16px" class="card m-b-20">
                                        <div class="card-body">
                                            <h5 style="text-align:center;color:blue;font-weight:bold" class="card-title">{{ $assento->designacao }} == {{ $assento->capacidade }} LUG.</h5><hr>
                                        </div>
                                        <?php if($assento->tipo=='Cadeira'){ ?>
                                            <img class="card-img-top img-fluid" src="{{ url('images/cadeira.png') }}" alt="Card image cap"><hr>
                                        <?php }else{ ?>
                                            <img class="card-img-top img-fluid" src="{{ url('images/mesa.jpg') }}" alt="Card image cap"><hr>
                                        <?php } ?>
                                        <div style="text-align:center" class="card-body">
                                            <a href='{{ url("/verAssento/{$assento->id}") }}' class="btn-primary btn-sm">VER</a>
                                            <a href="" class="btn-warning btn-sm">EDITAR</a>
                                            <a href='{{ url("/eliminarAssento/{$assento->id}/{$evento->id}") }}' class="btn-danger btn-sm">APAGAR</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>    
                        </div>
                    </div>
                </div>
            </div>
@stop