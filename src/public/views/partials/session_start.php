<?php

session_set_cookie_params(3600);
session_start();
$cookie_name = "userID";
$cookie_value = $_SESSION["userID"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
