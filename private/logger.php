<?php

class Logger
{

    private $IP;
    private $UA;
    private $PATH;
    private $DATE;
    private $LOGDIR;
    
    public function __construct($LOGDIR)
    {
    
        $this->IP = $this->getHumanIP();
        $this->UA = $this->getHumanUA();
        $this->PATH = $_SERVER["SCRIPT_NAME"];
        $this->DATE = date("(l) Y-m-d H:i:s");
        $this->LOGDIR = "$LOGDIR";
        
    }
    
    public function logHuman($logfile, $info=null)
    {
        
        if (!empty($info))
        {
            $logFormat = "INFO: $info\r\nIP: $this->IP\r\nUser-Agent: $this->UA\r\nDATE: $this->DATE\r\nPATH: $this->PATH\r\n\r\n";
        }
        else
        {        
            $logFormat = "IP: $this->IP\r\nUser-Agent: $this->UA\r\nDATE: $this->DATE\r\nPATH: $this->PATH\r\n\r\n";
        }
        $logFile = fopen("$this->LOGDIR/$logfile", "a");
        fwrite($logFile, $logFormat);
        fclose($logFile);
        
    }
    
    public function logGeoLocation($latitude, $longitude)
    {
    
        $logFormat = "Latitude: $latitude\r\nLongitude: $longitude\r\nIP: $this->IP\r\nUser-Agent: $this->UA\r\nDATE: $this->DATE\r\nPATH: $this->PATH\r\n\r\n";
        $logFile = fopen("$this->LOGDIR/geologs.txt", "a");
        fwrite($logFile, $logFormat);
        fclose($logFile);
    
    }
    
    public function logError($info)
    {
        
        $logFormat = "INFO: $info\r\nIP: $this->IP\r\nUser-Agent: $this->UA\r\nDATE: $this->DATE\r\nPATH: $this->PATH\r\n\r\n";
        $logFile = fopen("$this->LOGDIR/error_logs.txt", "a");
        fwrite($logFile, $logFormat);
        fclose($logFile);
        
    }
    
    private function getHumanIP()
    {
    
        if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (!empty($_SERVER["REMOTE_ADDR"]))
        {
            return $_SERVER["REMOTE_ADDR"];
        }	
        else
        {
            return "Unknown";
        }
        
    }
    
    private function getHumanUA()
    {
    
        if (!empty($_SERVER["HTTP_USER_AGENT"]))
        {
            return $_SERVER["HTTP_USER_AGENT"];
        }
        else
        {
            return "Unknown";
        }
        
    }

}

$logdir = dirname(__FILE__);
$logger = new Logger("$logdir/logs");
$logger->logHuman("visitors.txt", "Visitor's Informations");
