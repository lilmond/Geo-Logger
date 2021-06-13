<?php

class SessionValidator
{

    private $sessions;
    private $SESSION_FILE;
    
    public function __construct()
    {
    
        $DIR = dirname(__FILE__);
        $SESSION_LOGS = file_get_contents("$DIR/sessions.json");
        $SESSION_LIST = json_decode($SESSION_LOGS);
        $this->sessions = $SESSION_LIST;
        $this->SESSION_FILE = "$DIR/sessions.json";
    
    }
    
    private function saveSessions()
    {
    
        file_put_contents($this->SESSION_FILE, json_encode($this->sessions));
    
    }
    
    public function validate($session_id)
    {
    
        if (in_array($session_id, $this->sessions))
        {
            return true;
        }
        else
        {
            return false;
        }
    
    }
    
    public function addSession($session_id)
    {
    
        array_push($this->sessions, $session_id);
        $this->saveSessions();
    
    }
    
    
    public function removeSessions()
    {
    
        $this->sessions = array();
        $this->saveSessions();
    
    }

}

$sessionator = new SessionValidator();
