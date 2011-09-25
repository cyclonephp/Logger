<?php

use cyclone as cy;

return array(
    'log_level' => cy\Log::DEBUG,
    'adapters' => array(
        '' => new cy\log\adapter\FileAdapter(APPPATH . 'logs' . DIRECTORY_SEPARATOR)
    )
);
