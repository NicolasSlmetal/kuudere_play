


<?php
    include("services.php");
    //https://drive.google.com/file/d/1SNhTrXN4OvMlaON_j-dc0xs7h7_919s5/view?usp=sharing
    //https://drive.google.com/file/d/128MNvhzJFCZqqPPA-6mZgp766690dzHu/view?usp=sharing
    //https://drive.google.com/file/d/1tglD0xW-keXrzqfajWusixi1myP0g23C/view?usp=sharing
    echo "<iframe src='https://drive.google.com/file/d/1V79jTYKeu4wfrrvvS24WSN_HbqHaPK43/preview' width='640' height='480' allow='autoplay'></iframe>";
    $service = new ChapterService();
    $chapter = $service->getRepository()->operation("findbyid", 1);
    $date = $chapter->getDate();
    $date = $date->format("d/m/Y");
?>