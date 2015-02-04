<?php

class Auth extends PDOquery
{

    private $password;
    private $username;

    //private function __construct()
    //{
    //    $this->connect(DB_NAME, DB_HOST, DB_USER, DB_PASSWORD);
    //    $this->_model = get_class($this);
    //}

    private function doConnect()
    {
        Auth::connect(DB_NAME, DB_HOST, DB_USER, DB_PASSWORD);
    }

    public static function getConfig()
    {
      $config = RWConfig::read('Auth'.DS.'config.json');
    }

    public static function login($username, $password)
    {
        $this->_password = $password;
        $this->_username = $username;
        $stmt            = $this->_dbconnect->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(array('username' => $this->_username));
        $row             = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1) {
            $this->_passwordhash = $row["password"];
            if (password_verify($this->_password, $this->_passwordhash) == true) {
                $_user_browser            = $_SERVER['HTTP_USER_AGENT'];
                //$this->_userid          = preg_replace("/[^a-zA-Z0-9_\-]+/","",row["id"]);
                $_SESSION['user_id']      = $row["id"];
                //$this->_username        = preg_replace("/[^a-zA-Z0-9_\-]+/","",$this->_username);
                $_SESSION['username']     = $this->_username;
                $_SESSION['login_string'] = hash('sha512', $this->_passwordhash.$_user_browser);
                $_SESSION['level']        = $row["level"];
                return true;
             } else {
                   return false;
             }
        } else {
              return false;
        }
    }

    public static function checklogin()
    {
        if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
            $this->_username = $_SESSION['username'];
            $this->_userid   = $_SESSION['user_id'];
            $_user_browser   = $_SERVER['HTTP_USER_AGENT'];
            $stmt            = $this->_dbconnect->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->execute(array('username' => $this->_username));
            $row             = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                $this->_passwordhash = $row["password"];
                $_user_browser       = $_SERVER['HTTP_USER_AGENT'];

                if ($_SESSION['login_string'] == hash('sha512', $this->_passwordhash.$_user_browser)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public static function logout()
    {
        $_SESSION = array();
        $params   = session_get_cookie_params();
        setcookie(session_name(),
                  '',
                  time() - 42000,
                  $params["path"],
                  $params["domain"],
                  $params["secure"],
                  $params["httponly"]);
        session_destroy();
    }


    public static function startSession()
    {
            $session_name = 'catchpenny-project';   // Set a custom session name
            $secure       = false;
            $httponly     = true;
            if (ini_set('session.use_only_cookies', 1) === false) {
            } else {
                ini_set('session.entropy_file', '/dev/urandom');
                ini_set('session.entropy_length', '512');
                $cookieParams = session_get_cookie_params();
                session_set_cookie_params($cookieParams["lifetime"],
                                          $cookieParams["path"],
                                          $cookieParams["domain"],
                                          $secure,
                                          $httponly);
            session_name($session_name);
            session_start();
            session_regenerate_id(true);
          }
    }

    ///WANRNING!!!!!! TEMP FUNCTION DELETE ME
    /*function register($username,$password)
    {
       $password_hashed = password_hash($password, PASSWORD_BCRYPT);
       $stmt = $this->_dbconnect->prepare('INSERT INTO users (username,password) VALUES (:username,:password)');
       $stmt->execute(array(':username'=>$username,':password'=>$password_hashed));
    }
    */

   public function __destruct()
   {
     $this->close();
   }
}
