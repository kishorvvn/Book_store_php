<?php

// HELPER FUNCTIONS
function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}




// to redirect
function redirect($location){
    header("Location: $location");
}

//to send a query
function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

// to confirm query is returned with result
function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED". mysqli_error($connection));
    }
}
// to remove unneccessary string being submited with query
function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

//to fetch array results
function fetch_array($result){
    return mysqli_fetch_array($result);
}
//______________________________________________________________________________
//GET PRODUCTS
    function get_products(){
        $query = query("SELECT * FROM books");
        confirm($query);
        while ($row = fetch_array($query)) {
            $book = <<<DELIMETER
       
            <div class="col-lg-2 col-md-3 col-sm-6 p-2">
                <div class="card">
                    <div class="card-img-wrapper">
                        <img class="image card-img-top img-thumbnail" src="../resources/uploads/{$row['book_image']}" alt="Card image cap">
                        <a href="item.php?id={$row['book_id']}" class="btn btn-info btnfront icon animate"><i class="fas fa-info" aria-hidden="true"></i></a>
                    <div class="card-body">
                            <h6 class="card-title text-center mb-1">{$row['book_title']}</h6>
                            <p class="card-text text-center text-muted">&#36;{$row['book_price']}</p>
                        
                    </div>
                    
                </div>
            </div>
        </div>
DELIMETER;
            echo $book;
        }
    };
// get books by categories
function get_bookByCategory(){
    $query = "SELECT * FROM books WHERE book_cat_id =" . escape_string($_GET['id']) . " ";
    global $connection;
    $send_query = mysqli_query($connection, $query);
    if( ! mysqli_num_rows($send_query) ){
        echo "<h3 class='text-center ml-4 pl-2'> are not available.</h3>";
    }
    while ($row = fetch_array($send_query)) {
        
        $book = <<<DELIMETER
        
    <div class="card col-lg-2 col-md-3 col-sm-6 p-0">
        <img class="card-img-top w-50 mx-auto" src="../resources/uploads/{$row['book_image']}" alt="{$row['book_title']}">
            <div class="card-body">
                <h5 class="card-title">{$row['book_title']}</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        <div class="card-footer text-center">
            <a href="index.php" class="btn btn-info"><i class="fa fa-home"></i></a>
            
            <a href="cart.php?add={$row['book_id']}" type="submit" class="btn btn-info" value="ADD TO CART"><span class="fas fa-cart-plus"></span></a>
                       
    </div>
    </div>
    

DELIMETER;
        echo $book;
    }
};
// get category
function get_categories(){
    // design a sql query
    $query = query("SELECT * FROM categories");
    // submit a query to the database connection
   confirm($query);
    // $send_query returns an array of objects, loop through it and echo
    while($row = mysqli_fetch_array($query)){
        echo "<a class='dropdown-item' href='categories.php?id={$row['cat_id']}'>{$row['cat_title']}</a>";
    };
}

// get product detail
function get_product_detail(){
    $query = query("SELECT * FROM books WHERE book_id =" . escape_string($_GET['id']) . " ");
    confirm($query);
    while ($row = fetch_array($query)) {
        $category = show_category_title_inAdmin($row['book_cat_id']);
        $book_detail = <<<DELIMETER

        <div class="row col-lg-8 ml-auto mr-auto mt-1">
        <div class="col-sm-5">
            <img class="card-img-top img-thumbnail" style="height:78%;" src="../resources/uploads/{$row['book_image']}" alt="{$row['book_title']}">
        </div>
        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
                <div class="row">
                    <h4 class="col-sm-8"><a class="text-info" href="#">{$row['book_title']}</a> </h4>
                    <h4 class="col-sm-4">&#36;{$row['book_price']}</h4>
                </div>
                <hr>
                <div class="row ml-5">
                        <h6 class="col-sm-5">Author: </h6> <p class="col-sm-5">{$row['book_author']}</p>
                </div>
                <div class="row ml-5">
                        <h6 class="col-sm-5">Published on: </h6> <p class="col-sm-5">{$row['book_publishedDate']}</p>
                </div>
                <div class="row ml-5">
                        <h6 class="col-sm-5">ISBN: </h6> <p class="col-sm-5">{$row['book_isbn']}</p>
                </div>
                <div class="row ml-5">
                        <h6 class="col-sm-5">Category: </h6> <p class="col-sm-5">{$category}</p>
                </div>
                <div class="row ml-5">
                        <h6 class="col-sm-5">Qty available: </h6> <p class="col-sm-5">{$row['book_quantity']}</p>
                </div>
                <div class="text-center">
                <a href="cart.php?add={$row['book_id']}" type="submit" class="btn btn-info mx-auto" value="ADD TO CART"><span class="fas fa-cart-plus"></span> Add to cart</a>
                </div>
            </div>
          </div>
        </div>
      </div>
DELIMETER;
        echo $book_detail;
    }
};
// send message
function send_message(){
    $result = "";
    if(isset($_POST['submit'])){
        require '../public/PHPMailerAutoLoad.php';
        require 'credentials.php';

        $mail = new PHPMailer;
        $mail -> SMTPDebug = 4;
        // set mailer to use SMTP
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = EMAIL;
        $mail -> Password = PASSWORD;
        // TLS encryption, 'ssl' also accepted
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;

        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('kishorvvn@gmail.com');     // Add a recipient
                       
        $mail->addReplyTo($_POST['email'], $_POST['name']);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Form Submission: ' . $_POST['subject'];
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = $_POST['message'];

        if(!$mail->send()) {
            $result =  'Message could not be sent. Please try again';
            $result = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $result =  "Thanks " . $_POST['name']. "for contacting us. We'll get back to you soon!";
        }


    }
}

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

// Admin function

function get_admin_products(){
    $query = query("SELECT * FROM books");
        confirm($query);
        while ($row = fetch_array($query)) {
            // need to pass book_cat_id we are getting from $row = fetch_array($query)
            $category = show_category_title_inAdmin($row['book_cat_id']);

            $book = <<<DELIMETER
            <tr>
            <td>{$row['book_id']}</td>
            <td>{$row['book_title']}<br>
            <!-- after uploading book image display image from uploads folder -->
              <img width='75' class="img img-thumbnail " src="../../resources/uploads/{$row['book_image']}" alt="{$row['book_title']}">
            </td>
            <td>{$category}</td>
            <td>{$row['book_author']}</td>
            <td>{$row['book_isbn']}</td>
           <td>{$row['book_publishedDate']}</td>
           <td>&#36; {$row['book_price']}</td>
           <td>{$row['book_quantity']}</td>
           <td><a href="index.php?edit_product&id={$row['book_id']}" class="text-black"><i class="fas fa-edit fa-lg"></i></a></td>
           <td><a href="../../resources/templates/back/delete_book.php?id={$row['book_id']}" class="text-danger"><i class="fas fa-trash-alt fa-lg"></i></a></td>
        </tr>
DELIMETER;
echo $book;
    }
}

function add_product_inAdmin(){
    if(isset($_POST['publish'])){
        $book_title = escape_string($_POST['book_title']);
        $book_author = escape_string($_POST['book_author']);
        $book_isbn = escape_string($_POST['book_isbn']);
        $book_publishedDate = escape_string($_POST['book_publishedDate']);
        $book_price = escape_string($_POST['book_price']);
        $book_quantity = escape_string($_POST['book_quantity']);
        $book_cat_id = escape_string($_POST['book_cat_id']);
        // images will be taken as a file and it has a name
        $book_image = $_FILES['file']['name'];
        //images will be stored at temp location with temp name before uploading
        $image_temp_location = $_FILES['file']['tmp_name'];
        // move uploaded image to the uploads/image.jpeg
        move_uploaded_file($image_temp_location, UPLOAD_DIR . DS . $book_image);

        $query = query("INSERT INTO books(book_title, book_author, book_publishedDate, book_isbn, book_price, book_image, book_quantity, book_cat_id) VALUES ('{$book_title}', '{$book_author}','{$book_publishedDate}','{$book_isbn}','{$book_price}','{$book_image}','{$book_quantity}','{$book_cat_id}');");
        confirm($query);

        set_message("Book {$book_title} added sucessfully");
        redirect("index.php?products");




    }
}
function edit_product_inAdmin(){
    if(isset($_POST['update'])){
        $book_title = escape_string($_POST['book_title']);
        $book_author = escape_string($_POST['book_author']);
        $book_isbn = escape_string($_POST['book_isbn']);
        $book_publishedDate = escape_string($_POST['book_publishedDate']);
        $book_price = escape_string($_POST['book_price']);
        $book_quantity = escape_string($_POST['book_quantity']);
        $book_cat_id = escape_string($_POST['book_cat_id']);
        // get book image as a file from file input
        $book_image = $_FILES['file']['name'];


        // if file is uploaded
        if(!empty($book_image)){
            $book_image = $_FILES['file']['name'];
            //images will be stored at temp location with temp name before uploading
            $image_temp_location = $_FILES['file']['tmp_name'];
            // move uploaded image to the uploads/image.jpeg
            move_uploaded_file($image_temp_location, UPLOAD_DIR . DS . $book_image);

            
        } 
        
        // if file is not uploaded
        else {
            // images will be taken as a file and it has a name
            $book_image_query = query("SELECT book_image FROM books WHERE book_id = " . escape_string($_GET['id']) . "");
            confirm($book_image_query);
                while ($image = fetch_array($book_image_query)) {
                    $book_image = $image['book_image'];
                };
        }
        

        $query = query("UPDATE books SET book_title = '{$book_title}', book_author = '{$book_author}', book_isbn = '{$book_isbn}', book_publishedDate = '{$book_publishedDate}', book_price = '{$book_price}', book_quantity = '{$book_quantity}', book_cat_id = '{$book_cat_id}', book_image = '{$book_image}' WHERE book_id = " . escape_string($_GET['id']));
        confirm($query);

        set_message("Book {$book_title} updated sucessfully");
        redirect("index.php?products");




    }
}

// to dynamically show categories in admin#################################################################
function show_categories_inAdmin(){
    // design a sql query
    $query = query("SELECT * FROM categories");
    // submit a query to the database connection
   confirm($query);
    // $send_query returns an array of objects, loop through it and echo
    while($row = mysqli_fetch_array($query)){
        $categories_options = <<<DELIMETER
        <option value = "{$row['cat_id']}">{$row['cat_title']}</option>
DELIMETER;
        echo $categories_options;
    };
}

// to dynamically show category title in admin
// this function is called in get_admin_products() function
function show_category_title_inAdmin($book_cat_id){
    // design a sql query
$cat_query = query("SELECT * FROM categories WHERE cat_id = '{$book_cat_id}'");
    // submit a query to the database connection
   confirm($cat_query);
    // $send_query returns an array of objects, loop through it and echo
    while($cat_row = fetch_array($cat_query)){
        return $cat_row['cat_title'];
    };
}

// add categories in admin

function add_categories_inAdmin(){
    if(isset($_POST['submit'])){
        
        $book_cat_title = escape_string($_POST['book_cat_title']);
       
        if(empty($book_cat_title)){
            redirect("index.php?categories");            
        } 
        
        
        else {
            
            $book_cat_query = query("INSERT INTO categories (cat_title) VALUES ('{$book_cat_title}')");
            confirm($book_cat_query);
            set_message("Category {$book_cat_title} added sucessfully");
            redirect("index.php#nav-categories");
        }
    }
}

function show_categories_inAdminPage(){
             $book_cat_query = query("SELECT * FROM categories");
            confirm($book_cat_query);
            while($row = fetch_array($book_cat_query)){
                $category = <<<DELIMETER
                <tr>
                    <td>{$row['cat_id']}</td>
                    <td>{$row['cat_title']}</td>
                    <td><a href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}" class="text-danger"><i class="fas fa-trash-alt fa-md"></i></a></td>
                </tr>
DELIMETER;
                echo $category;
            };

        }

        // carousel images on home page ##############################################################

       function get_user_inAdmin(){
        $query = query("SELECT * FROM users");
        confirm($query);
        while ($row = fetch_array($query)) {
            // need to pass book_cat_id we are getting from $row = fetch_array($query)
          

            $user = <<<DELIMETER
            <tr>
            <td>{$row['user_id']}</td>
            <td>{$row['user_first']}</td>
            <td>{$row['user_last']}</td>
            <td>{$row['user_email']}</td>
            <td>{$row['user_username']}</td>
            <td>{$row['user_role']}</td>
           
           <td><a href="index.php?edit_user&id={$row['user_id']}" class="text-black"><i class="fas fa-edit fa-lg"></i></a></td>
           <td><a href="../../resources/templates/back/delete_user.php?id={$row['user_id']}" class="text-danger"><i class="fas fa-trash-alt fa-lg"></i></a></td>
        </tr>
DELIMETER;
echo $user;
    }
}



function edit_user_inAdmin(){
    if(isset($_POST['update'])){
        $user_first = escape_string($_POST['user_first']);
            $user_last = escape_string($_POST['user_last']);
            $user_email = escape_string($_POST['user_email']);
            $user_username = escape_string($_POST['user_username']);
            $user_role = escape_string($_POST['user_role']);
        
        if(empty($user_first ) || empty($user_last) || empty($user_email) || empty($user_username)|| empty($user_role)){
            redirect("index.php?users");
        } 
        else {
            $query = query("UPDATE users SET user_first = '{$user_first}', user_last = '{$user_last}', user_email = '{$user_email}', user_username = '{$user_username}', user_role = '{$user_role}' WHERE user_id = " . escape_string($_GET['id']));
        confirm($query);

        set_message("User role {$user_role} added to {$user_first} sucessfully");
        redirect("index.php?products");
        }
    }
}

?>