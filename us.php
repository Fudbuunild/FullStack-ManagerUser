<?php
include 'users.php';
$users = getAllUsers()->fetchAll();

foreach ($users as $user) {
    echo "<tr>";
    echo '<td>';
    echo '<input type="checkbox" class="selectUser" value="'.$user['id'].'" aria-label="Checkbox for following text input">';
    echo '</td>';
    echo "<td class=\"td-id\" style=\"display:none;\">";
    echo $user['id'];
    echo "</td>";
    echo "<td class=\"td-firstname\">";
    echo $user["firstname"];
    echo "</td>";
    echo "<td class=\"td-lastname\">";
    echo $user["lastname"];
    echo "</td>";
    echo "<td class=\"td-status\">";
    if ($user["status"] == "active")
        echo "<div class=\"greenCircle\"></div>";
    else
        echo "<div class=\"grayCircle\"></div>";
    echo "</td>";
    echo '<td class="td-role">';
    echo  $user["role"];
    echo '</td>';
    echo '<td>';
    echo '<button type="button" class="btn btn-primary mr-1 btn-edit" value="'.$user['id'].'">Edit</button>';
    echo '<button type="button" value="'.$user['id'].'" class="btn btn-danger btn-delete" >Delete</button>';
    echo '</td>';
    echo "</tr>";

}
?>