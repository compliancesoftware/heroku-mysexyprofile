<?php
    class ResponseMessage {

        private $message;
        private $status;

        const STATUS_OK = 'Ok';
        const STATUS_ERROR = 'Error';

        public function __construct() {
            $this->message = 'Error';
            $this->status = self::STATUS_ERROR;
        }

        public function setMessage($message) {
            $this->message = $message;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getMessage() {
            return $this->message;
        }

        public function getStatus() {
            if($this->status == self::STATUS_OK) {
                return self::STATUS_OK;
            }
            else {
                return self::STATUS_ERROR;
            }
        }

        public function serialize() {
            $str = json_encode(get_object_vars($this));
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            }, $str);
            return $str;
        }
    }

?>