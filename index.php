<?php
include("db/connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/iconsf.png">
    <title>Sistema de Agendamento</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <img src="img/logo_agendador.png" alt="SisAgendador" width="120">
                </a>

                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=contacts">Contatos</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=tasks">Tarefas</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=events">Eventos</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <?php
            $menuop = (isset($_GET["menuop"])) ? $_GET["menuop"] : "home";
            switch ($menuop) {
                case 'home':
                    include("pages/home/home.php");
                    break;

                    //Contacts
                case 'contacts':
                    include("pages/contacts/contacts.php");
                    break;
                case 'cad-contact':
                    include("pages/contacts/cad-contact.php");
                    break;
                case 'insert-contact':
                    include("pages/contacts/insert-contact.php");
                    break;
                case 'edit-contact':
                    include("pages/contacts/edit-contact.php");
                    break;
                case 'atualizar-contact':
                    include("pages/contacts/atualizar-contact.php");
                    break;
                case 'delete-contact':
                    include("pages/contacts/delete-contact.php");
                    break;

                    //Events
                case 'events':
                    include("pages/events/events.php");
                    break;
                case 'cad-event':
                    include("pages/events/cad-event.php");
                    break;
                case 'insert-event':
                    include("pages/events/insert-event.php");
                    break;
                case 'edit-event':
                    include("pages/events/edit-event.php");
                    break;
                case 'delete-event':
                    include("pages/events/delete-event.php");
                    break;
                case 'update-event':
                    include("pages/events/update-event.php");
                    break;

                    //Tasks     
                case 'tasks':
                    include("pages/tasks/tasks.php");
                    break;
                case 'cad-task':
                    include("pages/tasks/cad-task.php");
                    break;
                case 'insert-task':
                    include("pages/tasks/insert-task.php");
                    break;
                case 'edit-task':
                    include("pages/tasks/edit-task.php");
                    break;
                case 'delete-task':
                    include("pages/tasks/delete-task.php");
                    break;
                case 'update-task':
                    include("pages/tasks/update-task.php");
                    break;

                    //Home
                default:
                    include("pages/home/home.php");
                    break;
            }
            ?>
        </div>
    </main>
    <footer class="container-fluid fixed-bottom bg-dark mt-5">
        <div class="text-center text-white">SIS Agendador Versão1.0</div>
    </footer>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <script src="./js/upload.js"></script>
    <script src="./js/javascript-agendador.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
</body>

</html>