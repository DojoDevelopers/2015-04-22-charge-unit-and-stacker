<?php

namespace Dojo;

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * @author Dojo team
 */
class ExampleTest extends PHPUnit
{
    public function testInstanceCreation()
    {
        $this->assertInstanceOf(
            'Dojo\Example',
            new Example(),
            'Falha no assetInstanceOf da classe Dojo\Example'
        );
    }
}
