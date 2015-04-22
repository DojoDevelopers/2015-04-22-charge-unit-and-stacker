# Objetivo

###  Skeleton
Overview sobre como utilizar o nosso [Skeleton](https://github.com/DojoDevelopers/Skeleton) para criar um puzzle

### Baby steps
Continuar trabalhando o conceito de Baby steps.

### setUp() e tearDown()
Conhecer e implementar as funções setUp() e tearDown() da classe PHPUnit_TestCase

### Algorítmio de frete
Utilização de algortímo "similar" ao do nosso dia a dia.
	
### Faixa bonus
Vamos simular uma alteração em um código legado

# Puzzle

Para calcular o valor do frete de um ou mais produtos, é necessário descobrir a *"unidade de cobrança de frete"*.

Existem 2 tipos de unidade de cobrança de frete:

	- frete volumetrico
	- frete por peso bruto

A unidade de cobrança de frete é baseada nos totais de _peso_ e _volume_ do(s) produto(s):

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

# Resolvendo o puzzle

Dada a seguinte entrada:

	{
	    "sku-1": {
	        "quantidade": 3,
	        "peso": 500, // peso em gramas
	        "volume": 600 // largura * altura * profundidade
	    },
	    "sku-2": {
	        "quantidade": 3,
	        "peso": 670, // peso em gramas
	        "volume": 400 // largura * altura * profundidade
	    }
	}

Devemos descobrir a _"unidade de cobrança de frete"_ para cada sku.

	{
    		"sku-1": "frete volumetrico",
    		// [volume total] = 2988 (600 * 1.66 * 3)
    		// [peso total] = 1500  (500 * 3)
    		
    		"sku-2": "frete por peso bruto"
    		// [peso total] = 2010  (670 * 3)
    		// [volume total] = 1992 (400 * 1.66 * 3)
	}


# Bonus track - A excessão para items empilháveis

O algortimo que acabamos de criar sofrerá uma alteração.

Alguns produtos podem ser empilháveis, e isto deve ser considerado na escolha da *"unidade de cobrança de frete"*

Para consideramos uma sku como empilhável, ela deve atender os seguintes pré-reqiusitos:
	
	- Possuir o atributo fator_de_empilhamento
	- Quantidade > 1

### Alteração no algoritmo 

O algoritmo de escolha da *"unidade de cobrança de frete"* deve somar o *"fator de empilhamento"* para cada produto adicional
	
		* Apresentação do exemplo da cadeira na lousa

Formula

	(volume * fator de cubagem) + (fator_de_empilhamento * (quantidade - 1))

Dada a seguinte entrada:

	{
	    "sku-1": {
	        "quantidade": 3,
	        "fator_de_empilhamento": 350,
	        "peso": 500,
	        "volume": 600
	    },
	    "sku-2": {
	        "quantidade": 3,
	        "fator_de_empilhamento": 300,
	        "peso": 670,
	        "volume": 400
	    }
	}

Devemos descobrir a _"unidade de cobrança de frete"_ para cada sku.

	{
    		"sku-1": "frete volumetrico",
    		// [volume total] = 1696 (600 * 1.66 + 700)
    		// [peso total] = 1500 (500 * 3)
    		
    		"sku-2": "frete por peso bruto"
    		// [peso total] = 2010 (670 * 3)
    		// [volume total] = 1264 (400 * 1.66 + 600)
	}

### Before starting

Antes de começarmos com a mão na massa. Que tal analisar o impacto de nossa alteração no código legado?
Antes de sair codando é legal nos questionarmos sobre coisas dom tipo:

	Os testes antigos devem manter o mesmo comportamento com a nova implementação que esta por vir?

	Esta é uma mudança na regra de negócio existente ou o que vamos implementar é apenas uma exceção da regra?
	
No nosso caso em específico, estamos implementando uma excessão da regra, portando para este caso os testes devem continuar funcionando ao termino do nosso desenvolvimento.

Com base nesta informação, nós devemos verificar se podemos reaproveitar algo do teste legado ou até mesmo melhora-lo se for o caso.
