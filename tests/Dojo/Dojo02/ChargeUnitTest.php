<?php

namespace Dojo\Dojo02;

use PHPUnit_Framework_TestCase as PHPUnit;

/**
 * @author Dojo team
 */
class ChargeUnitTest extends PHPUnit
{
    /**
     * @var ChargeUnit
     */
    protected $class;

    public function setUp()
    {
        $this->class = new ChargeUnit();
    }

    public function tearDown()
    {
        $this->class = null;
    }



    public function testRetornoPesoBruto()
    {
        $skuList = array(
            'sku-2' => array(
                'quantidade' => 3,
                'peso' => 670,
                'volume' => 400,
            ),
        );
        $skuListResult = array(
            'sku-2' => 'frete por peso bruto',
        );

        $this->assertEquals(
            $skuListResult,
            $this->class->calcule($skuList)
        );
    }

    public function testRetornoVolumetrico()
    {
        $skuList = array(
            'sku-1' => array(
                'quantidade' => 3,
                'peso' => 500,
                'volume' => 600,
            ),
        );
        $skuListResult = array(
            'sku-1' => 'frete volumetrico',
        );

        $this->assertEquals(
            $skuListResult,
            $this->class->calcule($skuList)
        );
    }
}
