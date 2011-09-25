<?php

return array(
    'log_level' => Log::DEBUG,
    'adapters' => array(
        '' => new cyclone\log\adapter\FileAdapter(APPPATH . 'logs' . DIRECTORY_SEPARATOR)
    )
);
