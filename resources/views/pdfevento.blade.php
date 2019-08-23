<!DOCTYPE html>
<html>
    <head>
        <title>GESTEVENTO</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background:white">
        <div class="container-fluid">
                <?php 
                    $evento = App\Model\Evento::where('id', '=', 1)->get(); 
                ?>
                <div style="height:115px;border:solid 1px black" class="card-box widget-user">    
                    <div class="row">
                        <div class="col-6">
                            <h3 style="font-size:16px">Entidade</h3>
                            <h3 style="font-size:16px">Local</h3>
                            <h3 style="font-size:16px">Tipo</h3>
                            <h3 style="font-size:16px">Data</h3>
                            <h3 style="font-size:16px">Hora</h3>
                        </div>
                        <div class="col-6">
                            <h3 style="font-size:15px;margin-left:150px">: <?php echo $evento[0]->entidade ?></h3>
                            <h3 style="font-size:15px;margin-left:150px">: <?php echo $evento[0]->local ?></h3>
                            <h3 style="font-size:15px;margin-left:150px">: <?php echo $evento[0]->tipo ?></h3>
                            <h3 style="font-size:15px;margin-left:150px">: <?php echo $evento[0]->data ?></h3>
                            <h3 style="font-size:15px;margin-left:150px">: <?php echo $evento[0]->hora ?></h3>
                        </div>
                    </div>
                </div>
            <br>
            <div class="row">
                <div class="col-12">
                    
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>