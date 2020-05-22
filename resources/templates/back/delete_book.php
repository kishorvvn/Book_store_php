<?php 
require_once("../../config.php");

if(isset($_GET['id'])){
    $query = query("DELETE FROM books WHERE book_id = " . escape_string($_GET['id']) . "");
    confirm($query);

    set_message("Book deleted");
    redirect("../../../public/admin/index.php");
}else {
    redirect("../../../public/admin/index.php");
}


?>