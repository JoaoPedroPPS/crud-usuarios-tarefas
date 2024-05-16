<?php
require_once('./bd/conn.php');
require_once('valida_session.php');


unset ($_SESSION['nome']);
unset ($_SESSION['email']);
unset ($_SESSION['senha']);


$tasks = [];

$sql = $pdo->query("SELECT * FROM task");

if($sql->rowCount()>0){
    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        /* Estilos adicionais para a sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            padding: 48px 0; /* Ajuste o padding conforme necessário */
            background-color: #343a40; /* Cor de fundo da sidebar */
        }

        .sidebar-brand {
            padding: 0 20px;
            font-size: 1.5rem;
            line-height: 56px;
            color: #fff; /* Cor do texto */
        }

        .sidebar-nav {
            margin-top: 20px;
        }

        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.75); /* Cor do texto dos links */
        }

        .sidebar-nav .nav-link.active {
            color: #fff; /* Cor do texto dos links ativos */
        }
    </style>
    <title>Lista de afazeres</title>
</head>
<body>
   <!-- Sidebar -->
   <nav class="sidebar">
        <div class="sidebar-brand">
            OS Admin
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="usuario.php">
                    <i class="fa fa-user-circle mr-2"></i>
                    Usuários
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="to_do_list.php">
                    <i class="fas fa-fw fa-clipboard-list mr-2"></i>
                    Tarefas
                </a>
            </li>
        </ul>
    </nav>


    <!-- Conteúdo da página -->
    <div id="content">
        <!-- Aqui vai o conteúdo da sua página -->
        <div id="to_do">


<h1>Lista de Afazeres</h1>

<form action="actions/create.php" method="POST" class="to-do-form">
    <input type="text" name="description" placeholder="Escreva aqui a descrição" required>
    <button type="submit" class="form-button">
        <i class="fa-solid fa-plus"></i>
    </button>
</form>

<div id="tasks">
    <?php foreach($tasks as $task): ?>
        <div class="task">
        <input 
            type="checkbox"
            name="progress" 
            class="progress <?=$task['completed'] ? 'done' : '' ?>" 
            data-task-id="<?=$task['id']?>"
            <?=$task['completed'] ? 'checked' : '' ?>>
            
            <p class="task-description">
                <?=$task['description']?>
            </p>

            <div class="task-actions">
                <a class="action-button edit-button">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>

                <a href="actions/delete.php?id=<?=$task['id']?>" class="action-button delete-button">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </div>

            <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden" >  
                <input type="text" class="hidden" name="id" value="<?=$task['id']?>">
                <input type="text" name="description" placeholder="Edite sua tarefa aqui" value='<?=$task['description']?>'>
                <button type="submit" class="form-button confirm-button">
                    <i class="fa-solid fa-check"></i>
                </button>
            </form>
        </div>
    <?php endforeach ?>    
</div>
</div>


    </div>
  
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>