<?php
class Utils
{
  public static function deleteSession($name)
  {
    if (isset($_SESSION[$name])) {
      $_SESSION[$name] = null;
      unset($_SESSION[$name]);
    }
  }
  
  public static function verify()
  {
    if (!isset($_SESSION['userLog'])) {
      header('Location: ' . baseUrl);
    }
  }
}
