# LearnEasy

LearnEasy é uma plataforma de cursos online.

A idéia desse projeto é aprender como implementar as boas práticas de desenvolvimento de código.

Sugestões de melhoria são bem vindas.


## Installation

Instale as dependências do projeto

```bash
composer install --no-dev
```

## Gerar tabelas do Banco de Dados
```
vendor/doctrine/orm/bin/doctrine.php orm:schema-tool:update --force
```

## Usage

```bash
php -S localhost:8000 -t public/
```