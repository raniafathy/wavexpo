<?php

set_time_limit(0);

if ($_REQUEST["sessionid"])
   session_id($_REQUEST["sessionid"]);

function checkclose()
{
   global $_SESSION;
   if ($_SESSION["closesession"])
   {
       unset($_SESSION["closesession"]);
       die();
   }
}

while(!$close)
{
   session_start();
   $_SESSION["test"] = rand();
   checkclose();
   session_write_close();
   sleep(5);
}
?>