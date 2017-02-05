<?php
include "NoteDao.php";
$userid=$_POST['userid'];
$dao=T();
$result=$dao->getNoteList($userid);
$dao->release();
echo json_encode($result);
?>