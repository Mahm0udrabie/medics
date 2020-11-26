 <?php
    function user_exits($value, $table, $row)
    {
        global $db;
        $query = $db->prepare("SELECT COUNT(*) FROM $table WHERE $row = :value ");
        $result = $query->execute(['value'=>$value]);
        if ($query->fetchColumn() > 0) {
            return true;
        } else {
            return  false;
        }
    }
    function send_feedback() {
        global $db;
        $feedback_name  = trim($_POST['name']);
        $feedback_email = trim($_POST['email']);
        $body           = trim($_POST['body']);
        $errors = [
            'name'  => '',
            'email' => '',
            'body'  => ''
        ];
        if ($feedback_name == '') {
            $errors['name'] = "name can not be empty";
        }
        if (strlen($feedback_name) <  4) {
            $errors['name'] = "name needs to be longer";
        }
        if ($feedback_email == '') {
            $errors['email'] = "email can not be empty";
        }
        if ($body == '') {
            $errors['body'] = "message can not be empty";
        }
        if (strlen($body) <  40) {
            $errors['body'] = "message needs to be longer";
        }
        foreach ($errors as $key => $value) {
            if (empty($value)) {
                unset($errors[$key]);
            } 
        }
        if (empty($errors)) {
            $stmt  = $db->prepare("INSERT INTO feedback (Name, Message, Email) VALUES(?,?,?)");
            $_send =$stmt->execute([$feedback_name,$body,$feedback_email]);

           
            // $query = "INSERT INTO feedback (Name, Message, Email) VALUES('$feedback_name','$body','$feedback_email')";
            if (!$_send) {
                die("query failed" . $stmt->errorInfo());
            } else {
                $_SESSION['feedback'] = 'Message Sent';
            }
        }
        return $errors; 
    }




    ?>