<p align="center">
    <img src="https://banners.beyondco.de/RFB%20Document.png?theme=light&packageManager=composer+require&packageName=tongedev%2Frfb-document&pattern=architect&style=style_1&description=+valide%2Fgere%2Fformate+um+n%C3%BAmero+de+RG%2FCPF&md=1&showWatermark=0&fontSize=100px&images=identification" width="600" alt="RFB-document">
    <p align="center">
        <a href="https://github.com/tongedev/rfb-document/actions"><img alt="Total Downloads" src="https://github.com/tongedev/rfb-document/actions/workflows/tests.yml/badge.svg?branch=main"></a>
        <a href="https://github.com/tongedev/rfb-document/issues"><img alt="Issues Open" src="https://img.shields.io/github/issues/tongedev/rfb-document"></a>
        <a href="https://packagist.org/packages/tongedev/rfb-document"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/tongedev/rfb-document"></a>
        <a href="https://packagist.org/packages/tongedev/rfb-document"><img alt="Latest Version" src="https://img.shields.io/packagist/v/tongedev/rfb-document"></a>
        <a href="https://packagist.org/packages/tongedev/rfb-document"><img alt="License" src="https://img.shields.io/packagist/l/tongedev/rfb-document"></a>
    </p>
</p>

------

**RFB Document** é um pacote que te ajuda a lidar com números de cadastro da Receita Federal do Brasil, CPF (cadastro de pessoa física) e CNPJ (cadastro nacional de pessoa jurídica). Através dele é possível gerar números de CPF/CNPJ válidos, validar um número existente e formatá-los. Tudo de maneira simples e prática.

> ❗ IMPORTANTE:  Este pacote não realiza nenhuma consulta na Receita Federal, portanto, não verifica a situação atual do documento ou se o mesmo está atrelado a uma pessoa ou empresa específico. Toda a checagem é baseada no algorítimo utilizado para gerar os números de cadastro.

## Requisitos

> **Requer [PHP 8.0+](https://www.php.net/releases/)**

Em caso de aplicações Laravel, existe o requisito da versão do framework.

| Laravel | RFB Document |
|---------|--------------|
| 8.x     | 1.x          |
| 9.x     | 1.x          |

## Instalação

Para instalar o pacote, basta usar o [composer](https://getcomposer.org):

```bash
composer require tongedev/rfb-document
```

Em caso de aplicações Laravel, não é preciso publicar o pacote nos Providers, isso é feito de forma automática pelo auto discovery, durante a instalação.

## Como usar

### Classes

Uma forma de se usar o **RFB Document** se dá instanciando a classe correspondente ao documento desejado (CPF ou CNPJ) e então usufruindo dos recursos disponíveis:

```php
// no caso de querer manipular CPF
$cpfClass = new Tongedev\RfbDocument\CPFDocument(); 

$cpf = $cpfClass->generate(); // retorno: xxxxxxxxxxx (um número de CPF aleatório)

// no caso de querer manipular CNPJ
$cnpjClass = new Tongedev\RfbDocument\CNPJDocument(); 

$cnpj = $cnpjClass->generate(); // retorno: xxxxxxxxxxx (um número de CNPJ aleatório)
```

### Facades

Em aplicações Laravel, é possível tirar proveito do container IoC (inversion of control) presente no framework. Quando o pacote é instalado, suas facades são automaticamente publicadas entre os Providers, permitindo um uso mais rápido dos recursos:

```php
$cpf = CPF::generate(); // retorno: xxxxxxxxxxx (um número de CPF aleatório)

$cnpj = CNPJ::generate(); // retorno: xxxxxxxxxxxxxx (um número de CNPJ aleatório)
```

## Recursos

Os recursos disponíveis são: geração de um novo documento válido, sanitização, formatação e validação de um dado documento. Destacando que as chamadas dos recursos são as mesmas para CPF e CNPJ.

| Recurso    | Parâmetro                            | Retorno                              |
|------------|--------------------------------------|--------------------------------------|
| generate() | bool   \| formatted (default: false) | documento, formatado ou não (string) |
| sanitize() | string \| documentNumber             | documento sanitizado (string)        |
| format()   | string \| documentNumber             | documento formatado (string)         |
| validate() | string \| documentNumber             | se documento é válido ou não (bool)  |

Os exemplos funcionam para `CPF` e também para `CPNJ`, bastando apenas alterar a classe chamada.

```php
$cpf = CPF::generate(); // retorno: xxxxxxxxxxx (cpf sanitizado)

$cpf = CPF::generate(true); // retorno: xxx.xxx.xxx-xx (cpf formatado)

$cpf = CPF::sanitized('xxx.xxx.xxx-xx'); // retorno: xxxxxxxxxxx (cpf sanitizado)

$cpf = CPF::format('xxxxxxxxxxx'); //retorno: xxx.xxx.xxx-xx (cpf formatado)

$cpf = CPF::validate('xxx.xxx.xxx-xx'); // retorno: booleano dependendo do valor passado no parâmetro

$cpf = CPF::validate('xxxxxxxxxxx'); // é possível passar documento sanitizado também para validação
```

## Exceções

Caso as funções recebam valores ou cadeias de caracteres que não correspondem a um conjunto de dígitos esperado de um dos documentos, uma exceção é lançada:

```php
$cpf = CPF::format('123456ASasdfas'); // esse código irá gerar uma exceção do tipo `RfbDocumentException`.
```

## Contribuindo

Obrigado por considerar contribuir para o RFB Document. Tudo sobre contribuições está descrito [aqui](CONTRIBUTING.md).

👋 Siga o autor [@tongedev](https://twitter.com/tongedev) no Twitter para saber das últimas novidades e conhecer outros projetos. Diga oi!

## Licença

RFB Document é um software open source licenciado sob a [Licença MIT](LICENSE.md).
