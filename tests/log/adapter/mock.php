<?php

class Log_Adapter_Mock extends cyclone\log\adapter\AbstractAdapter {

    public $entries;

    public function  add_entry($level, $message, $code = NULL) {
        $this->entries []= array(
            'level' => $level,
            'message' => $message,
            'code' => $code
        );
    }

    public function  write_entries() {
        ;
    }
}