<?php
$pid = $_POST['data'][0]['pid'];
$mid = (!empty($_POST['data'][0]['data']) ? $_POST['data'][0]['data'] : []);
$ar = array();
$sql = '';
$conn = mysqli_connect('localhost', 'root', '', 'music');
if (!empty($mid)) {
    foreach ($mid as $r) {
        $getRow = "select id from album_song where aid = '{$pid}' and mid ='{$r}'";
        $res = mysqli_query($conn, $getRow);
        if (mysqli_num_rows($res) == 0) {
            if ($sql != '') {
                $sql .= ',';
            }
            $sql .= "(null,'{$pid}','{$r}')";
        } else {
            $ar[0] = "101";
        }
    }
    if ($sql != '') {
        $sql = 'insert into album_song values ' . $sql;
        mysqli_query($conn, $sql) ? $ar[0] = '200' : $ar[0] = '501';

    }
} else {
    $ar[0] = '401';
}
echo $ar[0];
