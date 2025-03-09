<?php

namespace Utils;

class SessionManager
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            // var_dump($_SESSION);
        }
    }

    public static function authRoles($page)
    {
        switch ($_SESSION['roles']) {
            case '1':
                if($page !== 'rapport'|| $page !== 'repas' ){
                    header('Location: /erreur.php?error=erreur');
                    exit();
                }
                break;
            case '2':
                return true;
                break;
            case '3':
                return true;
                break;
            default:
                return false;
        }

        switch($_SESSION['roles']){
            case 1 : // role veterinaire
              if($_SERVER['SCRIPT_NAME'] !== '/admin/index.php' && $_SERVER['SCRIPT_NAME'] !== '/admin/pages/rapport.php'){
                header('Location: /erreur.php?error=erreur');
                  exit();
              };
              break;
              case 2 : // role employé
                  if($_SERVER['SCRIPT_NAME'] === '/admin/pages/employee.php.php'&& $_SERVER['SCRIPT_NAME'] === '/admin/pages/rapport.php'){
                    header('Location: /erreur.php?error=erreur');
    
                      exit();
                  };
                  break;
                  case 3 : //role admin
                      break;
          }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroy()
    {
        session_unset();
        session_destroy();
    }
}
