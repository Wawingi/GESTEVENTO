<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}">

        <title>GESTEVENTO</title>
        
        <link href="{{ url('plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('plugins/jquery-circliful/css/jquery.circliful.css') }} " rel="stylesheet" type="text/css"/>
        <link href="{{ url('plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url('css/icons.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>  
        <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css"/> 
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Inclusão do menu Bar ========== -->
            @include('menubar')
            <!-- ========== Inclusão do menu lateral ====== -->
            @include('menulateral')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            @yield('content')
            
            <!-- end content -->
            <footer class="footer">
                2019 © GESTEVENTO
            </footer>
        </div>
    </div>

    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <!-- Plugins  -->
    
    <script src="{{ url('js/modernizr.min.js') }}" type="text/javascript"></script>       
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
    
    <!--<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        //Adicionar dados com AJAX
        $(document).on('click','.create-modal', function() {
            $('#criareventomodal').modal('show');
            $('.form-horizontal').show();
            $('.modal-title').text('Registar Evento');
        });

        $("#add").click(function() {
            $.ajax({
                type: 'POST',
                url: 'inserir',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'tipo': $('select[name=tip]').val(),
                    'entidade': $('input[name=entid]').val(),
                    'local': $('input[name=loc]').val(),
                    'data': $('input[name=dat]').val(),
                    'hora': $('input[name=hor]').val()                    
                },
                success: function(data){
                    if ((data.errors)) {    
                        console.log('ERROR'); 
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.tipo);
                        $('.error').text(data.errors.entidade);
                        $('.error').text(data.errors.local);
                        $('.error').text(data.errors.data);
                        $('.error').text(data.errors.hora);
                    } else {
                        $('.error').remove();
                        $('#table').append("<tr class='post" + data.id + "'>"+
                        "<td style='text-align: center'>" + data.id + "</td>"+
                        "<td style='text-align: center'>" + data.tipo + "</td>"+
                        "<td style='text-align: center'>" + data.entidade + "</td>"+
                        "<td style='text-align: center'>" + data.local + "</td>"+
                        "<td style='text-align: center'>" + data.data + "</td>"+
                        "<td style='text-align: center'>" + data.hora + "</td>"+
                        "<td style='text-align: center;word-spacing: 10px'>"+
                        " <a href=''><span class='fa fa-eye'></span></a>"+
                        " <a href='' class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-tipo='" + data.tipo + "' data-entidade='" + data.entidade + "' data-local='" + data.local + "' data-data='" + data.data + "' data-hora='" + data.hora + "'><span class='fa fa-pencil-alt'></span></a>"+
                        " <a href='' class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-tipo='" + data.tipo + "' data-entidade='" + data.entidade + "' data-local='" + data.local + "' data-data='" + data.data + "' data-hora='" + data.hora + "'><span class='fa fa-trash'></span></a>"+
                        "</td>"+
                        "</tr>");
                        //$('#criareventomodal').modal('hide');      
                    }
                },
            });
            $('#tipo').val('');
            $('#entidade').val('');
            $('#local').val('');
            $('#data').val('');
            $('#hora').val('');
        });

        // Editar dados com Ajax
        $(document).on('click', '.edit-modal', function() {
            $('#footer_action_button').text(" Editar");
            $('#footer_action_button').addClass('fa-trash-alt');
            $('#footer_action_button').removeClass('fa-trash-alt');
            $('.actionBtn').addClass('btn-primary');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Editar Evento');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            $('#id').val($(this).data('id'));
            $('#tpo').val($(this).data('tipo'));
            $('#ent').val($(this).data('entidade'));
            $('#lcl').val($(this).data('local'));
            $('#dt').val($(this).data('data'));
            $('#hr').val($(this).data('hora'));
            $('#modalEditar').modal('show');
        });

        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'POST',
                url: 'editarEvento',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id").val(),
                    'tipo': $('#tpo').val(),
                    'entidade': $('#ent').val(),
                    'local': $('#lcl').val(),
                    'data': $('#dt').val(),
                    'hora': $('#hr').val()
                },
            success: function(data) {
                $('.evento' + data.id).replaceWith(" "+
                    "<tr class='post" + data.id + "'>"+
                        "<td style='text-align: center'>" + data.id + "</td>"+
                        "<td style='text-align: center'>" + data.tipo + "</td>"+
                        "<td style='text-align: center'>" + data.entidade + "</td>"+
                        "<td style='text-align: center'>" + data.local + "</td>"+
                        "<td style='text-align: center'>" + data.data + "</td>"+
                        "<td style='text-align: center'>" + data.hora + "</td>"+
                        "<td style='text-align: center;word-spacing: 10px'>"+
                        " <a href=''><span class='fa fa-eye'></span></a>"+
                        " <a href='' class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-tipo='" + data.tipo + "' data-entidade='" + data.entidade + "' data-local='" + data.local + "' data-data='" + data.data + "' data-hora='" + data.hora + "'><span class='fa fa-pencil-alt'></span></a>"+
                        " <a href='' class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-tipo='" + data.tipo + "' data-entidade='" + data.entidade + "' data-local='" + data.local + "' data-data='" + data.data + "' data-hora='" + data.hora + "'><span class='fa fa-trash'></span></a>"+
                        "</td>"+
                        "</tr>"); 
                        $('#modalEditar').modal('hide'); 
                }
            });
        });

        // Apagar dados com AJAX
        $(document).on('click', '.delete-modal', function() {
            $('#footer_action_button').text(" Apagar");
            $('#footer_action_button').removeClass('fa-trash-alt');
            $('#footer_action_button').addClass('fa-trash-alt');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Apagar Evento');
            $('.id').text($(this).data('id'));
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            $('#modalEditar').modal('show');
        });

        $('.modal-footer').on('click', '.delete', function(){
            $.ajax({
                type: 'POST',
                url: 'apagarEvento',
                data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
                },
                success: function(data){
                    $('.evento' + $('.id').text()).remove();
                    //$('#modalEditar').modal('hide');   
                }
            });
        });

        //validação para adoionar dinamicamente acompanhante de convidado
         $(function(){
				// Clona a linha oculta que tem campos base e agrega no final da tabela
				$("#maisAcompanhante").on('click', function(){
					$("#tabela tbody tr:eq(0)").clone().removeClass('linha').appendTo("#tabela");
				});
			 
				// Evento que selecciona a linha e elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
       
       //validação do formulário do assento para cadeira sem capacidade
        document.getElementById("tipo").onchange = function() {
            alterar();
        };
        function alterar() {
            var dado = document.getElementById("tipo");
            var itemSelecionado = dado.options[dado.selectedIndex].value;
                if (itemSelecionado==="Cadeira") {
                    document.getElementById("el").style.display = 'none';
                }else {
                    document.getElementById("el").style.display = 'block';
                }
        }

       
    </script>  
  
    <script>
        var resizefunc = [];
    </script>
    <!-- Plugins  -->  
    <script src="{{ url('js/modernizr.min.js') }}" type="text/javascript"></script>       
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/detect.js') }}"></script>
    <script src="{{ url('js/fastclick.js') }}"></script>
    <script src="{{ url('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('js/jquery.blockUI.js') }}"></script>
    <script src="{{ url('js/waves.js') }}"></script>
    <script src="{{ url('js/wow.min.js') }}"></script>
    <script src="{{ url('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ url('js/jquery.scrollTo.min.js') }}"></script>

    <!-- Counter Up  -->
    <script src="{{ url('plugins/waypoints/lib/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <!-- circliful Chart -->
    <script src="{{ url('plugins/jquery-circliful/js/jquery.circliful.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('plugins/jquery-sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>

    <!-- skycons -->
    <script src="{{ url('plugins/skyicons/skycons.min.js') }}" type="text/javascript"></script>

    <!-- Page js  -->
    <script src="{{ url('pages/jquery.dashboard.js') }}" type="text/javascript"></script>        

    <!-- Custom main Js -->
    <script src="{{ url('js/jquery.core.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/jquery.app.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
            $('.circliful-chart').circliful();
        });

        // BEGIN SVG WEATHER ICON
        if (typeof Skycons !== 'undefined') {
            var icons = new Skycons(
                    {"color": "#3bafda"},
                    {"resizeClear": true}
            ),
                    list = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

            for (i = list.length; i--; )
                icons.set(list[i], list[i]);
            icons.play();
        }
        ;

    </script>
</body>
</html>