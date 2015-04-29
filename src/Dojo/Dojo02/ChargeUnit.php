<?php

namespace Dojo\Dojo02;

/**
 * @author Dojo team
 */
class ChargeUnit
{
    public function calcule(array $skuList)
    {
        $skuListResult = array(
            'sku-1' => 'frete volumetrico',
            'sku-2' => 'frete por peso bruto',
        );

        $result = array();
        foreach ($skuList as  $sku => $data) {

            if ($this->calculateVolumetric($data) > $this->calculatePesoBruto($data)) {
                $result[$sku] = 'frete volumetrico';
            } else {
                $result[$sku] = 'frete por peso bruto';
            }
        }
        return $result;
    }

    public function calculateVolumetric($data)
    {
        return $data['quantidade'] * $data['volume'] *  1.66;
    }

    public function calculatePesoBruto($data)
    {
        return $data['quantidade'] * $data['peso'];
    }
}
