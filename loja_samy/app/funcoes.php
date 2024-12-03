<?php
    function formatarDinheiro($numero){
        return number_format((float)$numero, 2, ',', '.');
    }

    function draw_img($src,$class){
        echo "<img src=\"$src\" class=\"$class\">";
    }
    $dir = str_replace("\\","/",__DIR__);
?>



