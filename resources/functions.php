<?php

// HELPER FUNCTIONS
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
            <div class="col-sm-4 col-lg-3 col-md-4 p-3">
                <div class="card-deck">
                    <div class="card border-info mb-3">
                        <img class="card-img-top" src="{$row['book_image']}" alt="Card image cap">
                    <div class="card-body">
                            <h6 class="card-title">{$row['book_title']}</h6>
                            <p class="card-text">&#36;{$row['book_price']}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="item.php?id={$row['book_id']}" class="btn btn-info"><i class="fas fa-info"></i> &nbsp;More info</a>
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
        
    <div class="card col-lg-3 col-md-4 col-sm-4 p-0">
        <img class="card-img-top" src="{$row['book_image']}" alt="{$row['book_title']}">
            <div class="card-body">
                <h5 class="card-title">{$row['book_title']}</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        <div class="card-footer text-center">
            <a href="index.php" class="btn btn-info"><i class="fa fa-home"></i> Home</a>
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
        $book_detail = <<<DELIMETER
        <div class="container">
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card p-1">
                <div class="card-title">
                <img class="card-img-top mb-3" src="{$row['book_image']}" alt="{$row['book_title']}">
                    <h4 ><a class="text-info" href="#">{$row['book_title']}</a> </h4>
                    <hr>
                    <h4 class="">&#36;{$row['book_price']}</h4>
                        <div class="ratings">
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                                4.0 stars
                            </p>
                        </div>
                        <div class="row">
                        <h6 class="col-sm-6">Author: </h6> <p class="col-sm-6">{$row['book_author']}</p>
                        
                        <h6 class="col-sm-6 mt-0">Published on: </h6> <p class="col-sm-6">{$row['book_publishedDate']}</p>
                       
                        <h6 class="col-sm-6">ISBN: </h6> <p class="col-sm-6">{$row['book_isbn']}</p>
                        </div>
                        
                        <div class="card-footer mx-auto text-center">
                    <form action="">
                        <div class="form-group">
                        
                            <button type="submit" class="btn btn-info" value="ADD TO CART"><span class="fas fa-cart-plus"></span> Add to cart</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Nav tabs -->
          
    <div class="card col-md-8">
            <div class="row">
            <div class="col-xs-12 p-3">
                <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
                </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                </div>
                
                </div>
              </div>
        </div>
      </div>
    </div>
</div>
DELIMETER;
        echo $book_detail;
    }
};


?>