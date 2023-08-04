# Hospital API Project

Bem-vindo ao **Hospital API Project**! Logo abaixo terá todo o procedimento de instalação e inicialização do projeto localmente.

## Configuração Inicial

### 1. Clone este repositório para o seu ambiente local:
git clone https://github.com/nivslive/PHP-Laravel---HospitalAPIProject.git &&
cd PHP-Laravel---HospitalAPIProject

### 2. Crie o arquivo .env baseado no .env.example e configure as variáveis de ambiente, incluindo as configurações do banco de dados.

### Instale as dependências do Composer:
composer install


### Inicie os contêineres Docker usando Laravel Sail:
./vendor/bin/sail up

## Configuração do Banco de Dados

### Se você encontrar um erro de banco de dados não criado, siga estas etapas:

Acesse o ambiente do banco de dados no Docker.
Execute os seguintes comandos SQL para criar os bancos de dados necessários:

CREATE DATABASE IF NOT EXISTS hospital_api;
CREATE DATABASE IF NOT EXISTS testing;



### Cobertura de tests:
<img src="https://img001.prntscr.com/file/img001/YL0F2u1MQxmNycXj0EZNGg.png">
## EXECUTANDO TESTES 
### Para executar os testes do Laravel, utilize o comando Artisan:

php artisan test


### DOCKER SUBIU, MAS AS PORTAS ESTÃO OCUPADAS?
kill -9 $(lsof -t -i :PORT_NUMBER)
