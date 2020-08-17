<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase {

    public function testAssertEquals() {
        $text = 'Example test';
        $this->assertEquals('Example test', $text);
    }

    public function testAssertTrue() {
        $bool = true;
        $this->assertTrue($bool);
    }

    public function testAssertContains() {
        $languages = ['php', 'pyton', 'java'];
        $this->assertContains('php', $languages);
    }



}