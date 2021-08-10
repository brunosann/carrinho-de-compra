# Integração PagSeguro Loja de Jogos

### Projeto para criar integração com o meio de pagamento do PAGSEGURO, produtos fixos para teste

<hr/>

### Andamento do Projeto:

-   [x] Desenvolvimento
-   [ ] Finalizado

## Requisitos

-   MySql
-   PHP >= 7.3
-   Composer
-   NodeJs

## Como rodar o projeto:

-   Clone o projeto para sua maquina

-   Instalar dependencias
-   -   Terminal -> composer install
-   -   Terminal -> npm install

-   copie o arquivo **".env.example"** e crie um **".env"**

-   Crie um Banco de Dados com o nome **"integration"**

-   Criar as tabelas do Banco de Dados e popular dados
-   -   Terminal -> php artisan migrate --seed

-   Rodar o projeto
-   -   Terminal -> npm run prod
-   -   Terminal -> php artisan serve
