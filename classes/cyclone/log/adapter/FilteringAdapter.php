<?php

namespace cyclone\log\adapter;

use cyclone as cy;

/**
 * @author Bence Eros <crystal@cyclonephp.org>
 * @package logger
 */
class FilteringAdapter extends AbstractAdapter {

    protected $_final_adapter;

    protected $_callback;

    public function  __construct(AbstractAdapter $final_adapter, $callback) {
        $this->_final_adapter = $final_adapter;
        if ( ! is_callable($callback))
            throw new Log_Exception('invalid callback');
        $this->_callback = $callback;
    }

    public function write_entries() {
        // nothing to do here, the final adapter should take care
        // about writing the log entries
    }

    public function add_entry($level, $message, $code = NULL) {
        $entry = array(
            'level' => 'level',
            'time' => date($this->_time_format),
            'message' => $message,
            'remote_addr' => self::$_remote_addr,
            'code' => $code
        );
        if (cy\Log::$level_order[$level] >= cy\Log::$level_order[Log::$log_level]
                && call_user_func($this->_callback, $entry)) {
            $this->_entries []= $entry;
        }
    }


}
