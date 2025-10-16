<?php

namespace MTW\ResponseClass;

class JsonResponse
{
    public $status;
    public $message;
    public $data = [];
    public $statusCode;
    public $result;

    public function __construct($status, $message, array $data = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
        $this->result = array(
            'status' => $this->status
        );

        echo $this->response();
    }

    /**
     * Format user message with HTTP status code
     * @return false|string
     */
    private function response(): false|string
    {
        $statusCode = 200;

        switch ($this->status) {
            case "unauthorized":
                $statusCode = 401;
                break;
            case "exception":
                $statusCode = 500;
                break;
            default:
            case "ok":
                $statusCode = 200;
                break;

        }

        header('Content-Type: application/json; charset=utf-8');
        header(sprintf("HTTP/1.1 %s %s", $statusCode, $this->status), true, $statusCode);

        if ($this->message!= '') {
            $this->result['message'] = $this->message;
        }

        if (count($this->data) > 0) {
            $this->result['data'] = $this->data;
        }

        return json_encode($this->result);
    }

}
