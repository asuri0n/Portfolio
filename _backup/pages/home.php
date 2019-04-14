<?php
    $prep_stmt = "SELECT img_link FROM pf_images";
    $stmt = $pdo->prepare($prep_stmt);
    $stmt->execute();
    $imgs = $stmt->fetchAll(PDO::FETCH_OBJ);

    $prep_stmt = "SELECT cat_name, cat_id FROM pf_categories order by cat_id desc";
    $stmt = $pdo->prepare($prep_stmt);
    $stmt->execute();
    $cats = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div id="titlecard">
    <h1 class="offscreen">
        "Une photographie, c’est un fragment de temps qui ne reviendra pas." - Martine Franck
    </h1>
</div>

<div id="collections" class="hidden hscroll">
    <?php
        foreach (array_reverse(scandir("images/")) as $file)
        {
            if($file != "." and $file != "..") 
            {                 
                $img = scandir("images/".$file."/thumbs/")[2]; 
                echo "<div class='collection offscreen'>";
                    echo "<a href='".$file."'>";
                        echo "<img src='images/".$file."/thumbs/".$img."'>";
                    echo "</a>";
                    echo "<p class='collectionname'>".ucfirst(str_replace('-', ' ', $file))."</p>";
                echo "</div>";
            } 
        } 
    ?>
</div>

<div id="background" class="homebg rotatingbg">

</div>
<div id="tempbackground" class="homebg rotatingbg hidden">

</div>
<div id="bgimages">
    <?php  
        foreach (array_reverse(scandir("images/")) as $file)
            if($file != "." and $file != "..") 
                foreach (scandir("images/".$file."/fulls/") as $img)
                    if(explode('.',$img)[1] == "jpg")
                        echo "<div class='bgimg' data-image='images/".$file."/fulls/".$img."'></div>";
    ?>
</div>