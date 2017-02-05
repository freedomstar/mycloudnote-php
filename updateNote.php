<?php
include "NoteDao.php";
$noteID=$_POST['noteID'];
$title=$_POST['title'];
$context=$_POST['context'];
$dao = T();
$rs=$dao->updateNote($noteID,$title,$context);
$dao->release();
echo $rs;
?>