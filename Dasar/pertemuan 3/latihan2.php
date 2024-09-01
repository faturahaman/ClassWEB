<?php 
// looping pada array
// for/foreach
$angka = [3,2,15,10,11,77,89,1,45,452,]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan2</title>
</head>
<style>
    .kotak {
        width: 50px;
        height: 50px;
        text-align: center;
        background-color: salmon;
        line-height: 50px;
        margin: 3px;
        float: left;
    }
    .clear {clear: both;}
</style>
<body>
    <?php for ( $i = 0; $i <count($angka); $i++ ) {?>
    <div class="kotak"><?php echo $angka[$i] ?></div>
    <?php }?>
        <div class="clear"></div>

        </div>
        <?php foreach($angka as $a ) { ?>
        <div class="kotak"><?php echo $a?></div>
       <?php } ?>

       <div class="clear"></div>

       <?php foreach ($angka as $a) : ?>

        <div class="kotak"><?php echo $a?></div>
        <?php endforeach;?>

</body>
</html>