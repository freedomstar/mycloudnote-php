<?php
include "NoteDao.php";
$noteID=$_POST['noteID'];
$dao=T();
$result=$dao->getNote($noteID);
echo json_encode($result);
$dao->release();
?>