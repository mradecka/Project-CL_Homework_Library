<!DOCTYPE html>
<html lang="pl-PL">

    <head>
        <meta charset="UTF-8">
        <title>My Library</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div id="ban">
        </div>
        <nav class='navbar navbar-default'>
            <div class='container'>
                <div class="navbar-header">
                </div>
            </div>
        </nav>

        <div class="container">
            <div class='col-xs-12 col-sm-6 col-sm-offset-3'>
                <div class='page-header'>
                    <h1>Dodaj książkę</h1>
                </div>
                
                <div id="form-messages" class="success" class="error"></div>
                
                <div class='panel'>
                    <div class='panel-body'>
                        <form id="ajax-contact" action="./api/books.php" method="POST">
                            <div class='form-group'>
                                <label>Tytuł książki:</label>
                                <div class='input-group'>
                                    <input type="text" class='form-control' name='title' id='title'>
                                    <div class='input-group-addon' id='type'></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Autor:</label>
                                <input type="text" class='form-control' name="author" id="author">
                            </div>
                            <div class='clearfix'>
                                <div class="form-group form-group-mini">
                                    <label>Opis:</label>
                                    <input type='text' class='form-control' name="description" id="description">
                                </div>
                            </div>
                            <br>
                            <p>
                                <button type='submit' class='btn-warning' id='add'>Dodaj</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class='col-xs-12 col-sm-6 col-sm-offset-3'>
                <div class='page-header'>
                    <h1>Lista książek</h1>
                </div>

                <div class='panel'>
                    <div class='panel-body'>
                        <ol id="books">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="http://code.jquery.com/jquery-2.2.1.min.js""></script>
    <script src="library.js" type="text/javascript"></script>

</html>
