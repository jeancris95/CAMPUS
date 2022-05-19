
    <?php
    
    class Password{
        /* const SALT='cabezon'; */
       /*  public static function hash ($password){
            return hash('sha512',self::SALT. $password);
        } */
        public static function hash ($password){
            return password_hash($password,PASSWORD_DEFAULT,['cost'=>10]);
        }
       /*  public static function verify($password, $hash) {
            return ($hash == self::hash($password));
        } */
        public static function verify($password, $hash) {
            return password_verify($password,$hash);
        }
        
    }
    ?>