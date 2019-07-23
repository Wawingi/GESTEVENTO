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
<<<<<<< HEAD
                                    <h4 class="m-t-0 header-title"><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalevento"><i class='fa  fa-plus-square'></i> AD EVENTO</button></h4><hr><br>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
=======
                                        <h4 class="m-t-0 header-title">
                                        <!--<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalevento">
                                            <i class='fa  fa-plus-square'></i> AD EVENTO
                                        </button>-->
                                        </h4>
                                        <a href="#" class="create-modal btn btn-primary">
                                            <i class="fa  fa-plus-square"></i> AD EVENTO
                                        </a>
                                        <hr>
                                        

                                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
>>>>>>> Lançamento com requisição AJAX
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
<<<<<<< HEAD
                                        
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
=======

                                        <tbody>
                                        @foreach($eventos as $evento)
                                            <tr class="evento{{$evento->id}}">
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $evento->tipo }}</td>
                                                <td style="text-align: center">{{ $evento->entidade }}</td>
                                                <td style="text-align: center">{{ $evento->local }}</td>
                                                <td style="text-align: center">{{ $evento->data }}</td>
                                                <td style="text-align: center">{{ $evento->hora }}</td>
                                                <td style="text-align: center;word-spacing: 10px">
                                                    <a href='{{ url("/ver/{$evento->id}") }}' class="btn btn-primary btn-sm"  data-original-title='Ver'><i class='fa fa-eye'></i></a>
                                                    <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$evento->id}}" data-tipo="{{$evento->tipo}}" data-entidade="{{$evento->entidade}}" data-local="{{$evento->local}}" data-data="{{$evento->data}}" data-hora="{{$evento->hora}}"><i class='fa fa-pencil-alt'></i></a>
                                                    <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$evento->id}}" data-tipo="{{$evento->tipo}}" data-entidade="{{$evento->entidade}}" data-local="{{$evento->local}}" data-data="{{$evento->data}}" data-hora="{{$evento->hora}}"><i class='fa fa-trash-alt'></i></a>
                                                </td>
                                            </tr>
>>>>>>> Lançamento com requisição AJAX
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $eventos->links() }}
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD


=======
>>>>>>> Lançamento com requisição AJAX
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
<<<<<<< HEAD
@stop
=======

            {{-- Formulario Modal Criar Evento --}}
            <div id="criareventomodal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Tipo</label>
                                            <select id="tip" name="tip" class="custom-select mt-3">
                                                <option value="Casamento">Casamento</option>
                                                <option value="Aniversario">Aniversario</option>
                                                <option value="Forum">Forum</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Entidade</label>
                                            <input  type="text" class="form-control" id="entid" name="entid" placeholder="ex: Casal Acordeon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-3" class="control-label">Local</label>
                                            <input  type="text" class="form-control" id="loc" name="loc" placeholder="ex: Salão de Eventos GPLine">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-4" class="control-label">Data</label>
                                            <input  type="date" class="form-control" id="dat" name="dat" placeholder="ex: Ambiente Favorável">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-5" class="control-label">Hora</label>
                                            <input  type="time" class="form-control" id="hor" name="hor" placeholder="ex: Ambiente Favorável">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Fechar</button>
                                <button type="submit" id="add" class="btn btn-primary waves-effect waves-light">Registar</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Formulario Modal Editar Evento --}}
            <div id="modalEditar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="modal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">ID</label>
                                                <input  type="text" class="form-control" id="id" disabled>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Tipo</label>
                                                <select id="tpo" class="custom-select mt-3">
                                                    <option value="Casamento">Casamento</option>
                                                    <option value="Aniversario">Aniversario</option>
                                                    <option value="Forum">Forum</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Entidade</label>
                                                <input  type="text" class="form-control" id="ent" placeholder="ex: Casal Acordeon">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-3" class="control-label">Local</label>
                                                <input  type="text" class="form-control" id="lcl" placeholder="ex: Salão de Eventos GPLine">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-4" class="control-label">Data</label>
                                                <input  type="date" class="form-control" id="dt" placeholder="ex: Ambiente Favorável">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-5" class="control-label">Hora</label>
                                                <input  type="time" class="form-control" id="hr" placeholder="ex: Ambiente Favorável">
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            {{-- Form Delete Post --}}
                            <div class="deleteContent">
                                <h4 style="text-align:center">Tens a certeza que pretendes eliminar este item?</h4>
                                <span class="hidden id"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal"><span class="fa"></span>Fechar</button>
                            <button type="button" class="btn actionBtn"><span id="footer_action_button" class="fa"></span></button>
                        </div>
                    </div>
                </div>
            </div>
@endsection
>>>>>>> Lançamento com requisição AJAX
