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
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <!-- Importação da Modal Evento -->
                                    @include('modalevento')
                                    <h4 class="m-t-0 header-title"><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalevento"><i class='fa  fa-plus-square'></i> AD EVENTO</button></h4><hr><br>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">#</th>
                                            <th style="text-align: center">Tipo</th>
                                            <th style="text-align: center">Entidade</th>
                                            <th style="text-align: center">Local</th>
                                            <th style="text-align: center">Data</th>
                                            <th style="text-align: center">Hora</th>
                                            <th style="text-align: center">Opções</th>
                                        </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php $id=1 ?>
                                        @foreach($eventos as $evento)
                                        <tr>
                                            <td style="text-align: center">{{ $id++ }}</td>
                                            <td style="text-align: center">{{ $evento->tipo }}</td>
                                            <td style="text-align: center">{{ $evento->entidade }}</td>
                                            <td style="text-align: center">{{ $evento->local }}</td>
                                            <td style="text-align: center">{{ $evento->data }}</td>
                                            <td style="text-align: center">{{ $evento->hora }}</td>                                            
                                            <td style="text-align: center;word-spacing: 10px">        
                                                <a href='{{ url("/ver/{$evento->id}") }}' data-original-title='Ver'><i class='fa fa-eye'></i></a>
                                                <a href='{{ url("/editar/{$evento->id}") }}'><i class='fa fa-pencil-alt'></i></a>
                                                <a href='{{ url("/eliminar/{$evento->id}") }}'><i class='fa fa-trash-alt'></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $eventos->links() }}
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
@stop