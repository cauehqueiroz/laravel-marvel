<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Lara-marvel - Teste

Projeto simples para testar o Laravel 8

## Dependências

- Docker

Ou

- PHP 8
- Composer

## Instalação 
Apos clonar o repositório, siga os passos de acordo com o ambiente desejado:

### Utilizando Docker
O ambiente está pronto para rodar utilizando docker, se deseja utilizar de outra maneira recomendo alterar o arquivo `.env` p/ o ambiente desejado.

Primeiro execute o comando para subir os contêineres:
```bash
$ docker-compose up
```
após subir os contêineres, execute um comando na máquina do serviço PHP para liberar a pasta public:

```bash
$ docker-compose exec php-fpm chown -R www-data:www-data /application/public
```

instale as dependências:

```bash
$ docker-compose exec php-fpm composer install
```
Execute as migrações
```bash
$ docker-compose exec php-fpm php artisan migrate:fresh --seed
```
Se tudo correr bem seu ambiente estará rodando em: `http://localhost:14000`

### Instalação normal (PHP + Composer)

Para instalar usando apenas o PHP, primeiro instale as dependências:
```bash
composer install
```

Em seguida faça a configuração para seu banco de dados no `.env` e faça as migrações:
```bash
$ php artisan migrate:fresh --seed
```

Depois basta subir o servidor
```bash
$ php artisan serve 
```
Se tudo correr bem seu ambiente estará rodando em: `http://localhost:8000`

## Endpoints

Os seguintes endpoints foram implementados:
- `GET /v1/public/characters` - Lista os personsagens
- `POST /v1/public/character` - Salva um personagem e quadrinhos (se houverem)
Parametros: 
```
{
    "name": string,
    "description": string,
    "comics": [
        {
            "title": string,
            "format": string,
            "issueNumber": number,
            "description": string
        }
}
```
- `PUT /v1/public/character/{characterId}` - Edita um personagem e seus quadrinhos. Possui a mesma estrutura do POST só que com IDs para editar, sem IDs para persistir novos
- `GET/v1/public/character/{characterId}/comics` - Lista os quadrinhos de um personagem

## Testes

Para rodar os testes você deve apenas executar o comando:
```bash
$ php artisan test
```
