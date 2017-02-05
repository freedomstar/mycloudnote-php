<?php
class NoteDao
{
    private static $_con = null;
    public function NoteDao()
    {
        if ($this->_con == null) {
            $this->_con = mysqli_connect("xx.xx.xxx.xxx", "root", "xxxxxx");
            if ($this->_con == FALSE) {
                echo("connect to db server failed.");
                $this->_con = null;
                return;
            }
            @mysqli_select_db($this->_con,"myCloudNote");
        }
    }

    public function addUser($userid)
    {
        $sql="INSERT INTO user(userid) VALUES ('$userid')";
        if ($this->_con != null)
        {
            $query=mysqli_query($this->_con,$sql);
            $rs=mysqli_fetch_array($query);
            return 200;
        }
    }

    public function findUser($userid)
    {
        $sql="SELECT * FROM user WHERE userid='$userid'";
        if ($this->_con != null)
        {
            $query=mysqli_query($this->_con,$sql);
            $rs=mysqli_fetch_array($query);
            return $rs;
        }
    }

    public function  getAllUser()
    {
        $sql="SELECT * FROM user";

            if ($this->_con != null)
            {
                $query=mysqli_query($this->_con,$sql);
                $rs=mysqli_fetch_array($query);
                return $rs;
            }

    }

    public function getNoteList($userid)
    {
        $sql="SELECT title,noteID FROM note WHERE userid='$userid'";
        $list=array();

            if ($this->_con != null)
            {
                $query=mysqli_query($this->_con,$sql);
                while ($rs=mysqli_fetch_array($query))
                {
                    $list[]=$rs;
                };
            }
            return $list;
    }

    public function addNote($userid,$title,$context)
    {
        $sql="INSERT INTO note(userid, title, context) VALUES ('$userid','$title','$context')";

            if ($this->_con != null)
            {
                mysqli_query($this->_con,$sql);
                return 200;
            }

    }

    public function getNote($noteID)
    {
        $sql="SELECT * FROM note WHERE noteID={$noteID}";
        if ($this->_con != null)
        {
            $query=mysqli_query($this->_con,$sql);
            $rs=mysqli_fetch_array($query);
            return $rs;
        }
    }

    public function deleteNote($noteID)
    {
        $sql="DELETE FROM note WHERE noteID='$noteID'";
        try {
            if ($this->_con != null) {
                mysqli_query($this->_con, $sql);
                return 200;
            }
        }
        catch(exception $e)
        {
            return 100;
        }
    }

    public function updateNote($noteID,$title,$context)
    {
        $sql="UPDATE note SET title='$title',context='$context' WHERE noteID='$noteID'";
        try {
            if ($this->_con != null) {
                mysqli_query($this->_con, $sql);
                return 200;
            }
        }
        catch(exception $e)
        {
            return 100;
        }
    }

    public function release() {
        mysqli_close();
    }
}

function T() {
    return new NoteDao();
}

?>
