/**
 * Validate an email address.
 *
 * @link http://tools.ietf.org/html/rfc3696
 * @link http://www.linuxjournal.com/article/9585
 *
 * @param string $email Provide email address
 * @return bool Returns true if the email address has the email
 *              address format and the domain exists.
 */
function validEmail($email) {

    $atIndex = strrpos($email, "@");
    // If @ character not found
    if (is_bool($atIndex) && !$atIndex) {
        return false;
    }

    $local = substr($email, 0, $atIndex);
    $domain = substr($email, $atIndex + 1);

    if (strlen($local) < 1 || strlen($local) > 64) {
        // local part length exceeded
        return false;
    }

    if (strlen($domain) < 1 || strlen($domain) > 255) {
        // domain part length exceeded
        return false;
    }

    if ($local[0] == '.' || $local[strlen($local) - 1] == '.') {
        // local part starts or ends with '.'
        return false;
    }

    if (preg_match('/\\.\\./', $local)) {
        // local part has two consecutive dots
        return false;
    }

    if ( !preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain) ) {
        // character not valid in domain part
        return false;
    }

    if (preg_match('/\\.\\./', $domain)) {
        // domain part has two consecutive dots
        return false;
    }
    if ( !preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
            str_replace("\\\\","",$local)) &&
         !preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local)) ) {
        // character not valid in local part unless
        // local part is quoted
        return false;
    }

    if ( !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")) ) {
        // domain not found in DNS
        return false;
    }

    return true;
}
