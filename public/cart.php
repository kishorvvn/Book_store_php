<?php require_once("../resources/config.php"); ?>

<?php
    if(isset($_GET['add'])){
        // $_SESSION['book_' . $_GET['add']] += 1;
        // redirect("index.php");
        // grab information from incoming session on the page like product and its value
        // select all books from database with id = $_GET['add'])
        $query = query("SELECT * FROM books WHERE book_id =" . escape_string($_GET['add']) . "");
        confirm($query);

        while($row = fetch_array($query)){
            // if selected book quantity is not equal to required quantity of book, keep adding one
            if($row['book_quantity'] != $_SESSION['book_' . $_GET['add']]){
                $_SESSION['book_' . $_GET['add']] += 1;
                redirect("checkout.php");
                // else display message
            } else {
                set_message("We only have " . $row['book_quantity'] ."" . " of {$row['book_title']} available.");
                redirect("checkout.php");
            }

        }
    };
        

    if(isset($_GET['remove'])){
        

        if($_SESSION['book_' . $_GET['remove']] < 1){
            unset($_SESSION['item_total']);
            unset($_SESSION['item_quantity']);
            redirect("checkout.php");
        } else {
            $_SESSION['book_' . $_GET['remove']] --;
            redirect("checkout.php");
            if($_SESSION['book_' . $_GET['remove']] < 1){
                unset($_SESSION['item_total']);
                unset($_SESSION['item_quantity']);
                redirect("checkout.php");
            }
        }
    };

    if(isset($_GET['delete'])){
        $_SESSION['book_' . $_GET['delete']] = '0';
        // remove item from session
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);

        redirect("checkout.php");
        
    };

    function cart(){
        // initialize total
        $total = 0;
        $book_quantity = 0;
        // get product name and associated quantities from incoming session
        foreach($_SESSION as $name => $value){
            if($value > 0){
                // separate product name using sub string
                if(substr($name, 0, 5) == "book_"){
                    //determine lenght of a product_id string
                    $length = strlen($name) - 5;
                    // retrive product id from remaining string
                    $id = substr($name, 5, $length);
                            $query = query("SELECT * FROM books WHERE book_id = " . escape_string($id) . "");
                            confirm($query);

                            while($row = fetch_array($query)){
                                // calculate subtotal for the product
                                $sub = $row['book_price'] * $value;
                                $book_quantity += $value; 
                                $books = <<<DELIMETER
                                            <tr>
                                                <td>{$row['book_title']}</td>
                                                <td>&#36; {$row['book_price']}</td>
                                                <td><a href="cart.php?remove={$row['book_id']}" class="text-warning"><i class="fas fa-minus-square fa-lg"></i></a>
                                                    &nbsp;{$value} &nbsp;
                                                    <a href="cart.php?add={$row['book_id']}" class="text-success"> <i class="fas fa-plus-square fa-lg"></i></a>
                                                </td>
                                                <td>&#36; {$sub}</td>
                                                <td><a href="cart.php?delete={$row['book_id']}" class="text-danger"><i class="fas fa-trash-alt fa-lg"></i></a></td>
                                            
                                            </tr>
DELIMETER;
                                echo $books;
                            }
                            // calculate total and asign it to $_SESSION to be accessible in cart totals
                            $_SESSION['item_total'] = $total += $sub;
                            $_SESSION['item_quantity'] = $book_quantity;
                }
            }
        }
    };
    ?>
