<?php
    $titlePage = "Urbex";

    $cat_id = 3;

    $prep_stmt = "SELECT img_id, img_link, img_title, img_desc, img_date FROM pf_images WHERE cat_id = ? ORDER BY img_date DESC";
    $stmt = $pdo->prepare($prep_stmt);
    $stmt->execute(array($cat_id));
    $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

    // Nombre aléatoire pour générer le fond écran
    $rand = rand(0,sizeOf($imgs)-1);
?>
<!--collection-->
<div id="background">
    <div class="bgimg" data-image="<?php echo $imgs[$rand]->img_link; ?>"></div>
</div>

<div id="photogrid">
    <?php 
    foreach (scandir("images/urban-explorations/thumbs/") as $key => $file)
    {
        if(explode('.',$file)[1] == "jpg") 
        {
        echo "<div class='thumbnail hidden' data-background='photo.image.large'>";
            echo "<img class='thumbimage' src='images/urban-explorations/thumbs/".$file."' />"; // data-photoid="142425967"
            echo "<p></p>";
        echo "</div>";
        }
    } 
    ?>
</div>

<div id="mainimage">
    <div id='photos' class='swipe'>
        <div class='swipe-wrap'>
            <?php 
            foreach (scandir("images/urban-explorations/fulls/") as $key => $file)
            {
                if(explode('.',$file)[1] == "jpg") 
                {
                    echo "<div class='img' data-image='images/urban-explorations/fulls/".$file."'>";
                        //echo "<div class='ui photoinfo hidden'>";
                            // Photo Title & Description
                            //echo "<h2 class='phototitle'></h2>";
                            // Metadata
                            //echo "<ul class='metadata'></ul>";
                            // Date
                            //echo "";
                        //echo "</div>";
                    echo "</div>";
                }
            } 
            ?>
        </div>
    </div>

    <div class="ui button backbutton hidden">
        <div class="chevron">
            <div class="upper"></div>
            <div class="lower"></div>
        </div>
        <p>Back to gallery</p>
    </div>
    <div class="ui photonav button prev hidden">
        <div class="chevron">
            <div class="upper"></div>
            <div class="lower"></div>
        </div>
    </div>
    <div class="ui photonav button next hidden">
        <div class="chevron">
            <div class="upper"></div>
            <div class="lower"></div>
        </div>
    </div>
</div>
<!--/collection-->