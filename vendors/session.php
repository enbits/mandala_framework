<?php
session_start();
class session
{
    static $session_name='Default';
    
    /* Function name: Set
     * Params:
     * @name - The key to set
     * @Value - The value to set
     */
    public static function set($name, $value) {
        $_SESSION[self::$session_name][$name]=$value;
    }
    /* Function name: Get
    *  Params:
    *  @name - The key to get
    *  @default - Value to return if the requested key is empty.
    */
    public static function get($name, $default = null) {
        if(isset($_SESSION[self::$session_name][$name]) && !empty($_SESSION[self::$session_name][$name]))
            return $_SESSION[self::$session_name][$name];
        else
            return $default;
    }

    /* Function name: Get
     * Kills the session;  
     *  
     */
    public static function destroy() {
        unset($_SESSION);
        session_destroy();
    }  
}
?>