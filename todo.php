<?php
if(isset($_POST["all_todos"])){
    if($_POST["all_todos"] != ""){
        $todos = explode('-', $_POST["all_todos"]);
    }

    if(isset($_POST["id"])){
        if($_POST["id"] != ""){
            $tid = (int)$_POST["id"];
            array_splice($todos, $tid, 1);
        }
    }
} else {
    $todos = [];
}

if(isset($_POST["new_todo"])){
    if($_POST["new_todo"] != ""){
        $new_todo = $_POST["new_todo"];
        $todos[] = $new_todo;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="tdlist">
            <h1>Task List</h1>
            <form action="" method="post">
                <ul id="todo">
                    <li id="heading">TO DO</li>
                    <li>
                        <input type="text" name="new_todo" autofocus>
                        <input name="all_todos" type="hidden"
                            value="<?= (count($todos > 0)) ? implode('-', $todos) : NULL ?>">
                        <button name="add" type="submit">➕</button>
                    </li>
                    <?php
                        $task_id = 0;
                        foreach($todos as $todo){?>
                    <li class="task"><span><button name="id" value="<?= $task_id++; ?>"
                                type="submit">🗑️</button></span><?= $todo; ?></li>
                    <?php }
                    ?>
                </ul>
            </form>
        </div>
    </div>
</body>

</html>