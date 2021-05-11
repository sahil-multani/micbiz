<?php

//vars --------
// $fn = $_POST['fn'];
// $fb = $_POST['fb'];
// $tw = $_POST['tw'];
// $ig = $_POST['ig'];
// $pn = $_POST['pn'];
// $ln = $_POST['ln'];
// $uname = $_POST['uname'];
// $pwd = $_POST['pwd'];
// $mail = $_POST['mail'];
// $user = $_SESSION['user'];

//$conn = mysqli_connect('localhost', 'root', '', 'music') or die(mysqli_error());
$user = $_SESSION['user'];

if (isset($_POST['uname'])) {
    if (isset($_FILES['image']['name'])) {
        //vars

        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $uname = $_POST['uname'];
        //$pwd = $_POST['pwd'];
        //$mail = $_POST['mail'];

        //image upload
        $errors = [];
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $explode = explode('.', $_FILES['image']['name']);
        $i = str_replace(' ', '', microtime());
        $j = str_replace('.', '', $i);
        $file_ext = strtolower(end($explode));
        $extensions = ['jpeg', 'jpg', 'png'];

        if ($file_name != '') {
            if (in_array($file_ext, $extensions) === false) {
                $errors[] = 'extension not allowed, please choose a JPEG or PNG file.';
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }

            if (empty($errors)) {
                $file = rand(100, 1000000) * 3 * 12 . '.' . $file_ext;

                $sql = "UPDATE `user` SET `img`='{$file}',`uname` = '{$uname}',`fname`='{$fn}',`lname`='{$ln}' WHERE `user`.`uname` = '{$user}'";

                if (mysqli_query($conn, $sql)) {
                    $_SESSION['user'] = $uname;
                    move_uploaded_file($file_tmp, '../src/uploads/' . $file);
                    isdone("e1");
                }
            } else {
                iserror($errors);
            }
        } else {
            $sql = "UPDATE `user` SET `uname` = '{$uname}',`fname`='{$fn}',`lname`='{$ln}' WHERE `user`.`uname` = '{$user}'";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['user'] = $uname;
                isdone("e1");
            }
        }
    }
}
if (isset($_POST['data'])) {
    $sql = "SELECT `pwd` FROM `user` WHERE `uname` = '{$user}'";
    $res = mysqli_query($conn, $sql);
    $p = $_POST['data'];
    if (mysqli_num_rows($res) >= 1) {
        while ($row = mysqli_fetch_assoc($res)) {
            $pwd = $row['pwd'];
            echo $p == $pwd ? true : false;
        }
    }
}
if (isset($_POST['cpass'])) {
    $np = $_POST['npass'];
    $sql = "SELECT `pwd` FROM `user` WHERE `uname` = '{$user}'";
    $res = mysqli_query($conn, $sql);
    $p = $_POST['cpass'];
    if (mysqli_num_rows($res) >= 1) {
        while ($row = mysqli_fetch_assoc($res)) {
            $pwd = $row['pwd'];
            $r = $p == $pwd ? true : false;
            if ($r) {
                $sql = "UPDATE `user` SET `pwd` = '{$np}' where `uname`='{$user}'";
                if (mysqli_query($conn, $sql)) {
                    isdone("e2");
                }
            } else {
                $errors[0] = "please check your current password and try again !";
                iserror($errors, "e2");
                echo "<script>toastr['error']( 'please verify  your current password !');</script>";
            }

        }
    }

}
if (isset($_POST['fb']) || isset($_POST['tw']) || isset($_POST['ig'])) {
    $fb = $_POST['fb'];
    $tw = $_POST['tw'];
    $ig = $_POST['ig'];

    $sql = "UPDATE `user` SET `ig`='{$ig}',`tw` = '{$tw}',`fb`='{$fb}' WHERE `uname`='{$user}'";
    clog($sql);
    if (mysqli_query($conn, $sql)) {
        isdone("e3");
    }
}
if (isset($_POST['mail'])) {
    $mail = $_POST['mail'];
    echo $sql = "UPDATE `user` SET `mail` = '{$mail}'  WHERE `uname` = '{$user}' ";

    if (mysqli_query($conn, $sql)) {
        isdone("e4");
    }
}

function isdone($e)
{
    echo "<script>toastr['info']( 'changes applied successfully !'); $('.{$e}').html('changes applied successfully !')</script>";
}
function iserror($errors, $e)
{
    echo "<script>$('.{$e}').html('{$errors[0]}'); </script>";
}
function clog($i)
{
    echo "<script> console.log('{$i}');</script>";
}
