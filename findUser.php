<?php
include "NoteDao.php";
$userid=$_POST['userid'];
$dao=T();
$result=$dao->findUser($userid);
if ($result==null)
{
    try {
        $result = $dao->addUser($userid);
        echo 200;
    }
    catch (exception $e)
    {
        echo 100;
    }
}
else
    {
        echo 200;
    }
$dao->release();
?>