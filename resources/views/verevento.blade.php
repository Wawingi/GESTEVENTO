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
                                        <li class="breadcrumb-item"><a href="#">Administração</a></li>
                                        <li class="breadcrumb-item active">Listar Eventos</li>
                                        <li class="breadcrumb-item active">Ver Evento</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
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
                                        <button type="submit" class="btn btn-primary"><i class='fa  fa-plus-square'></i> Inserir Convidado</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop