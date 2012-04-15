<?php

use cyclone\log\adapter;
use cyclone as cy;

class Log_Adapter_CompositeTest extends Kohana_Unittest_TestCase {

    public function testAddEntry() {
        $adapter1 = new Log_Adapter_Mock;
        $adapter2 = new Log_Adapter_Mock;

        $composite = adapter\CompositeAdapter::factory()
            ->add($adapter1)->add($adapter2);

        $composite->add_entry(cy\Log::INFO, 'msg', 1);

        $expected_entries = array(
            array('level' => cy\Log::INFO, 'message' => 'msg', 'code' => 1)
        );
        $this->assertEquals($expected_entries, $adapter1->entries);
        $this->assertEquals($expected_entries, $adapter2->entries);
    }

}