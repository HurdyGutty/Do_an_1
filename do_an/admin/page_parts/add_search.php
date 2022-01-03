<?php
$tim_kiem = $_GET['tim_kiem'];
$link = $_GET['link'];
header("location:../admin_view.php?link=$link&tim_kiem=$tim_kiem");

