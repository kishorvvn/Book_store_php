<?php 

$book_image = query("SELECT * FROM books");
           confirm($book_image);
          $i = 0;
          $li = '';
          $div = '';
         while($row = fetch_array($book_image)){
                    
             
               if($i == 0){
                $li .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
                $div.='
                <div class="carousel-item active">
                
                <div class="row" style="margin-left: 450px;">
                <a href="item.php?id='.$row['book_id'].'">
                <img src="../resources/uploads/'.$row['book_image'].'" class="img img-thumbnail shadow" alt="'.$row['book_title'].'">
                </a>
                </div>
                ';
               }
               else {
                $li .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
                $div.='
                <div class="carousel-item">
           
                <div class="row" style="margin-left: 450px;">
                <a href="item.php?id='.$row['book_id'].'">
                <img src="../resources/uploads/'.$row['book_image'].'" class="img img-thumbnail shadow" alt="'.$row['book_title'].'">
                </a>
                 </div>
                ';
               }
                $div .='</div>';

               $i++;
            }
           


?>







<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php echo $li;?>
    </ol>
    <div class="carousel-inner mb-5">
    <?php echo $div;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
            </div>