<?php

namespace cyclone\log\adapter;

/**
 * @author Bence Eros <crystal@cyclonephp.com>
 * @package logger
 */
class CompositeAdapter extends AbstractAdapter {

    public static function factory() {
        return new CompositeAdapter;
    }

    private $_adapters;

    /**
     * Add the adapter to the adapter list
     * 
     * @param AbstractAdapter $adapter
     * @return CompositeAdapter <code>$this</code>
     */
    public function add(AbstractAdapter $adapter) {
        $this->_adapters []= $adapter;
        return $this;
    }

    public function add_entry($level, $message, $code = NULL) {
        foreach ($this->_adapters as $adapter) {
            $adapter->add_entry($level, $message, $code);
        }
    }

    public function  __construct() {
        // just overriding the constructor - nothing to do in this case
    }

    public function write_entries() {
        // the adapters should take care about writing their log messages
        // we do nothing here to prevent duplicate log entries
    }

}
