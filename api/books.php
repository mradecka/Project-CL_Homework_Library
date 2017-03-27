
<?php

require_once 'book.php';


//get a book or books on site
if ('GET' == $_SERVER['REQUEST_METHOD']) {
    if (!empty($_GET['id']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $onlyBook = new Book();
        $a = $onlyBook->loadFromDB($conn, $id);

        echo json_encode($a);
        $s = new Book();
    } else {
        $allBooks = new Book();
        $allBooks->loadFromDBAll($conn);
        echo json_encode($allBooks->loadFromDBAll($conn));
    }
}



if ('POST' == $_SERVER['REQUEST_METHOD']) {

    $result['error'] = false;
    $result['info'] = '';
    $result['id'] = 0;

    //Weryfikacja każdego z pól z osobna
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $name = $_POST['title'];
    } else {
        $result['error'] = true;
        $result['info'] .='Brak tytułu książki. ';
    }

    if (isset($_POST['author']) && !empty($_POST['author'])) {
        $author = $_POST['author'];
    } else {
        $result['error'] = true;
        $result['info'] .='Brak autora książki. ';
    }

    if (isset($_POST['description']) && !empty($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        $result['error'] = true;
        $result['info'] .='Brak opisu książki. ';
    }


    if (!$result['error']) {
        $sql = 'Insert into `Book` Values (NULL, :name, :author, :description)';
        $sqlParams = [
            'name' => $name,
            'author' => $author,
            'description' => $description
        ];

        $query = $conn->prepare($sql);
        $query->execute($sqlParams);
        echo 'Książka została dodana. ';
    } else {
        echo $result['info'];
        echo 'Książka nie została dodana. ';
    }
}

if ('DELETE' == $_SERVER['REQUEST_METHOD']) {
    parse_str(file_get_contents("php://input"), $del);
    $delete = new Book();
    $delete->deleteFromDB($conn, $del);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $edit);
    $editBook = new Book();
    $editBook->update($conn, $edit['id'], $edit['name'], $edit['author'], $edit['description']);
}
?>