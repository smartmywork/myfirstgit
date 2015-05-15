<?php

    define('DOMAIN','educationhub.com');
    define('DOCROOT','C:/xampp/htdocs/educationhub');
    define('CONF_FOLDER','c:'.DS.'xampp'.DS.'apache'.DS.'conf'.DS);

class SubDomain{	

	private $_domain;

	public function __construct($domain = null) {exit(0);
		//$this->createDocRoot($domain);
		$this->createNewVhostFile($domain); 
		$this->restartApache();
		echo 4; 
    }

    /*
    * Function to create conf file in conf.d folder
    */
    function createNewVhostFile($subdomain) {
        $filename   = CONF_FOLDER.'httpd.conf';
        $fh         = file_get_contents($filename) or die("can't open file");
        $servername = $subdomain.'.'.DOMAIN;
        $docroot    =  DOCROOT;

    $virtualhost = '
    <VirtualHost *:80> 
        ServerName  '.$servername.'
        DocumentRoot '.$docroot.'
        ServerAlias '.$servername.'
    </VirtualHost>';
    	$fh .= "\n \n \n".$virtualhost;
        file_put_contents($filename,$fh);
        //fclose($fh);
    }

     /*
    * Function to restart apache
    */
    function restartApache() {
        ///$configtest = `c:/xampp/apache/bin/httpd configtest 2>&1`;
        $configtest = `c:/xampp/apache/bin/httpd configtest`;
        echo $configtest;
        if(strtolower(trim($configtest)) == 'syntax ok'){
            //$restart = `/etc/init.d/httpd restart 2>&1`;
            $restart = `c:/xampp/apache/bin/httpd restart`;
            echo $restart;
        }
    }

    /*
    * Create document root folder.
    */
    function createDocRoot($subdomain){
        $docroot =  DOCROOT.$subdomain; 
        if(is_dir($subdomain)){
            echo "Document root allready exists.";
        }else{
            mkdir($docroot,644);
        }
    }
}