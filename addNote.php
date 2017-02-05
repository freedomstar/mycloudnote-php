<?php
include "NoteDao.php";
$userid=$_POST['userid'];
$title=$_POST['title'];
$context=$_POST['context'];
$dao=T();
$result=$dao->addNote($userid,$title,$context);
$dao->release();
echo $result;
?>