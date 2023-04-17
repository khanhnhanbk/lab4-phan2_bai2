<?php
class SystemConfig
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "webservice";
    public  $dbConnect;
    public function __construct()
    {
        // TODO: Implement __construct() method.
    }

    public function __destruct()
    {
        $this->dbConnect->close();
    }

    public function connectDB()
    {
        $this->dbConnect = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->dbConnect->connect_errno) {
            return null;
        } else {
            return $this->dbConnect;
        }
    }
    public function getStatusCodeMessage($status)
    {
        $codes = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }
    public function sendResponse($status = 200, $body = '', $contentType = 'text/html')
    {
        $statusHeader = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusCodeMessage($status);
        header($statusHeader);
        header('Content-type: ' . $contentType);
        echo json_encode($body);
    }
}
