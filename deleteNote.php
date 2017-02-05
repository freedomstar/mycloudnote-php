<?php
include "NoteDao.php";
$noteID=$_POST['noteID'];
$dao=T();
$result=$dao->deleteNote($noteID);
echo $result;
$dao->release();
?>