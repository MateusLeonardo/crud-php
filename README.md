<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Cadastro de Produtos

Este é um projeto de exemplo de um sistema de cadastro de produtos usando o framework Laravel. Ele permite criar, listar, editar e excluir produtos. Cada produto possui um nome, descrição e imagem.

## Funcionalidades

- Criação de produtos
- Listagem de produtos
- Edição de produtos
- Exclusão de produtos

## Tecnologias Utilizadas

- PHP
- Laravel
- MySQL
- Bootstrap (para estilização)

## Requisitos

- PHP 7.3 ou superior
- Composer
- MySQL
- Node.js e npm (opcional, para compilação de assets)

## Instalação

Siga os passos abaixo para configurar e rodar o projeto na sua máquina local:

### 1. Clonar o Repositório

git clone https://github.com/MateusLeonardo/crud-php.git

## 2. Criar o Banco de Dados

CREATE DATABASE produtos;

## 3. Configurar o Arquivo .env

# 3.1 Renomeie o arquivo .env.example para .env:

# 3.2 Edite o arquivo .env e configure as seguintes variáveis de ambiente:

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:chave-gerada-automaticamente
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=produtos
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

FILESYSTEM_DRIVER=public

## 4. Gerar a Chave da Aplicação

php artisan key:generate

## 5. Instalar Dependências do PHP

composer install

## 6. Rodar as Migrações

php artisan migrate

## 7. Rodar o Servidor de Desenvolvimento

php artisan serve

A aplicação estará disponível em http://127.0.0.1:8000/
