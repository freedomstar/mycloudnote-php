<?php
include "NoteDao.php";
$dao=T();
$result=$dao->getAllUser();
$dao->release();
echo json_encode($result);
?>