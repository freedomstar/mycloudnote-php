<?php
include "NoteDao.php";
$dao = T();
if ($dao!=null)
{
    echo "ok";
}
$dao->release();
?>