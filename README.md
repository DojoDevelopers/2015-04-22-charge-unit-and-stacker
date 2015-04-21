# Puzzle

Para calcular o valor do frete de um ou mais produtos, é necessário descobrir a *"unidade de cobrança de frete"*.

Existem 2 tipos de unidade de cobrança de frete:

	- frete volumetrico
	- frete por peso bruto

A unidade de cobrança de frete é baseada nos totais de _peso_ e _volume_ dos produto:

	Se:
		(volume total dos produtos) > peso total
	Então:
		unidade de cobrança de frete = frete volumetrico
	Em outro caso:
		unidade de cobrança de frete = frete por peso bruto

Uma vez que:

	- peso total dos itens = peso do item * quantidade
	- volume total dos itens = (volume * fator de cubagem) * quantidade
	  * Obs. O fator de cubagem = 1.66

# Objetivo

## Dada a seguinte entrada:
	{
	    "sku-1": {
	        "quantidade": 3,
	        "fator_de_empilhamento": 500,
	        "peso": 1500, // peso em gramas
	        "volume": 1000 // largura * altura * profundidade
	    },
	    "sku-2": {
	        "quantidade": 3,
	        "fator_de_empilhamento": null,
	        "peso": 3500,
	        "volume": 2000
	    }
	}

## Descobrir a _"unidade de cobrança de frete"_

# @todo Descrever a excessão para empilháveis
