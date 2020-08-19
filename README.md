# Venda de Vinhos

Desenvolvido com o Laravel Lumen.

<<<<<<< HEAD
Essa API resolve os problemas:

#### 1 - Liste os clientes ordenados pelo maior valor total em compras.
#### 2 - Mostre o cliente com maior compra única no último ano (2016).
#### 3 - Liste os clientes mais fiéis.
#### 4 - Recomende um vinho para um determinado cliente a partir do histórico

## Arquitetura

Foi desenvolvido no padrão REST o que permite facilitar a integração com outros sistemas e abstrai de forma intuitiva os endpoints que utilizam a API original.

As regras de negócio forma definidas de forma a ficar separdas do core do framework para diminuir o acoplamento e facilitar a implementação dos padrões SOLID facilitando a escalabilidade.

As duas controllers principais: PurchasesHistoricController (histórico de compras) e CustomersController (clientes) foram implementadas seguindo o SRP (principio da responsabilidade única) controllers magras deixano a regra de negócio para a responsabilidade do domínio da aplicação no diretório "WineStore".

Na pasta WineStore encontra-se classes CustomerRequest e PurchasesHistoricRequest responsáveis por fazer as requisições para os dois endpoins específicos.

Existe um diretório "Response" com duas classes, essas responsáveis por implementar a resolução dos problemas de negócio e também responder em json.
=======
# API - Venda de Vinhos

Desenvolvido com o Laravel Lumen.

Essa API resolve os problemas:

#### 1 - Liste os clientes ordenados pelo maior valor total em compras.
#### 2 - Mostre o cliente com maior compra única no último ano (2016).
#### 3 - Liste os clientes mais fiéis.
#### 4 - Recomende um vinho para um determinado cliente a partir do histórico

## Arquitetura

Foi desenvolvido no padrão REST o que permite facilitar a integração com outros sistemas e abstrai de forma intuitiva os endpoints que utilizam a API original.

As regras de negócio forma definidas de forma a ficar separdas do core do framework para diminuir o acoplamento e facilitar a implementação dos padrões SOLID facilitando a escalabilidade.

As duas controllers principais: PurchasesHistoricController (histórico de compras) e CustomersController (clientes) foram implementadas seguindo o SRP (principio da responsabilidade única) controllers magras deixano a regra de negócio para a responsabilidade do domínio da aplicação no diretório "WineStore".

Na pasta WineStore encontra-se classes CustomerRequest e PurchasesHistoricRequest responsáveis por fazer as requisições para os dois endpoins específicos.

Existe um diretório "Response" com duas classes, essas responsáveis por implementar a resolução dos problemas de negócio e também responder em json.
>>>>>>> 3da432e982c198b6bffd5d61555aa1fd928d7637
