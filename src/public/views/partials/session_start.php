<?php

if (session_status() == PHP_SESSION_NONE) {
  session_set_cookie_params(3600);
  session_start();
}
