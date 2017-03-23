<?php
// file with connection data
require_once 'src/dbConnection.php';

class Book implements JsonSerializable {

    private $id;
    private $name;
    private $author;
    private $description;

    public function __construct() {
        $this->id = -1;
        $this->name = '';
        $this->author = '';
        $this->description = '';
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    //load one book
    public function loadFromDB($conn, $id) {


        $sql = 'SELECT * FROM `Book` Where `id` = :id ;';

        try {
            $query = $conn->prepare($sql);
            $query->execute(['id' => $id]);
            $book = $query->fetch();

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
        $this->id = $book['id'];
        $this->setName($book['name']);
        $this->setAuthor($book['author']);
        $this->setDescription($book['description']);
        $array[] = $this;
        
        return $array;
    }

    //load all books
    public function loadFromDBAll($conn) {
        $sql = 'SELECT * FROM `Book`;';

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            $books = $query->fetchAll();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
               $array = [];
        foreach ($books as $book) {
            $newbook = new Book();
            $newbook->id = $book['id'];
            $newbook->setName($book['name']);
            $newbook->setAuthor($book['author']);
            $newbook->setDescription($book['description']);
            $array[] = $newbook;
        }
        return $array;
    }

    //add new book
    public function create($conn, $name, $author, $description) {
        $sql = 'INSERT INTO `Book` (`id`, `name`, `author`, `description`) VALUES (NULL, :name, :author , :description);';

        try {
            $query = $conn->prepare($sql);

            $book = $query->execute([
                'name' => $name,
                'author' => $author,
                'description' => $description
            ]);
            if ($this->getId() === -1) {
                $this->id = $conn->lastInsertId();
            }
            return $book;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    //update a book
    public function update(PDO $conn, $id, $name, $author, $description) {
        $sql = 'Update `Book` SET   
                                    `name` = :name, 
                                    `author` = :author, 
                                    `description` = :description  
                                Where id = :id ;
                        ';
        $sqlParams = [
            'id' => $id,
            'name' => $name,
            'author' => $author,
            'description' => $description
        ];

        try {
            $query = $conn->prepare($sql);
            $result = $query->execute($sqlParams);
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage() . '<hr>';
            return false;
        }
    }

    //delete book
    public function deleteFromDB($conn, $id) {
        $sql = 'DELETE FROM `Book` WHERE `Book`.`id` = :id';
        try {
            $query = $conn->prepare($sql);
            $result = $query->execute($id);
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage() . '<hr>';
            return false;
        }
    }

    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "author" => $this->author,
            "description" => $this->description
        ];
    }

}
?>

