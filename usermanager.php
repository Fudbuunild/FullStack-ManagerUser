<?php
include"db_connection.php";

$id = isset($_POST['id']) ? $_POST['id'] : null;
$firstName = isset($_POST['firstname']) ? $_POST['firstname'] : null;
$lastName = isset($_POST['lastname']) ? $_POST['lastname'] : null;
$role = isset($_POST['role']) ? $_POST['role'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$op = isset($_POST['op']) ? $_POST['op'] : null ;

$data = [];

switch($op) {
    case "update":
        updateUser($firstName, $lastName, $role, $status,$id);
        succes();
        result();
        break;
    case 'create':
        createUser($firstName, $lastName, $role, $status);
        succes();
        result();
        break;
    case "delete":
        deleteUser($id);
        succes();
        result();
        break;
    case "setActive":
        setActive($id);
        succes();
        result();
        break;
    case "setNotActive":
        setNotActive($id);
        succes();
        result();
        break;
    case "deleteMany":
        deleteUsers($id);
        succes();
        result();
        break;
    default:
        $data = ["status" => "error"];
        result();
}
function setActive($id){
    global $db;
    $query="UPDATE `users` SET `status`=:status  WHERE id IN (";
    foreach ($id as $key => $value){
        $query = $query."".$value.",";
    }
    $query = substr($query, 0, strlen($query)-1);
    $query = $query .")";
    $statement = $db->prepare($query);
    $statement->bindValue(':status', "active");
    $statement->execute();

}
function setNotActive($id){
    global $db;
    $query="UPDATE `users` SET `status`=:status  WHERE id IN (";
    foreach ($id as $key => $value){
        $query = $query."".$value.",";
    }
    $query = substr($query, 0, strlen($query)-1);
    $query = $query .")";
    $statement = $db->prepare($query);
    $statement->bindValue(':status', "not active");
    $statement->execute();
}
function deleteUsers($id){
    global $db;
    $query="DELETE FROM `users` WHERE id IN (";
    foreach ($id as $key => $value){
       $query = $query."".$value.",";
    }
    $query = substr($query, 0, strlen($query)-1);
    $query = $query .")";
    $statement = $db->prepare($query);
    $statement->execute();
}

function updateUser($firstName, $lastName, $role, $status,$id) {
    global $db;
    $sql = "UPDATE `users` SET `firstname`=:firstname, `lastname`=:lastname, `role`=:role,`status`=:status  WHERE `id`=:id";
    $statement= $db->prepare($sql);
    $statement->bindValue(':firstname', $firstName);
    $statement->bindValue(':lastname', $lastName);
    $statement->bindValue(':role', $role);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':id', $id);
    $statement->execute();
}

function createUser($firstName, $lastName, $role, $status) {
    global $db;
    $db->query("INSERT INTO `users` (`firstname`, `lastname`, `role`, `status`) VALUES('$firstName', '$lastName', '$role', '$status')");
  }

	function deleteUser($id) {
        global $db;
    $query="DELETE FROM `users` WHERE id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
  }

  function succes() {
  	global $result;
    $result = ["status" => "succes"];
  }

	function result() {
    global $result;
    print_r($result);
  }

 ?>