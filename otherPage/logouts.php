<?php

session_start();
unset($_SESSION['name']);

unset($_SESSION['classes']);

header("location: ../mainPage.php", true, 301);


