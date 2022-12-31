<?php
define("DBHOST", "localhost");
define("DBUSER", "user");
define("DBPASS", "user");
define("DBNAME", "hw");

$link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
mysqli_set_charset($link, "utf8");