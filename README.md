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


## TESTES COM POSTMAN (TEST CASE DE API COM COLLECTION)

ENVIROMENTS:
| Variável        | Valor                       |
|-----------------|-----------------------------|
| {{token}}       | [TOKEN VIRÁ DO PATH /LOGIN] |
| {{dominio}}     | http://127.0.0.1:8000       |
| {{id_paciente}} | 1                           |
| {{id_medico}}   | 1                           |


<img src="https://img001.prntscr.com/file/img001/Le86X_NXSTiChbkRrML3kA.png">
<img src="https://img001.prntscr.com/file/img001/L084t_oZQi2UJv5qi_Ihhg.png">
<img src="https://img001.prntscr.com/file/img001/kYRWF3biQjiuZMDaYAZOyg.png">

### Cobertura de tests:

## OBS: Não irá funcionar os testes sem subir um banco de dados testing
CREATE DATABASE IF NOT EXISTS testing;


<img src="https://img001.prntscr.com/file/img001/YL0F2u1MQxmNycXj0EZNGg.png">


## EXECUTANDO TESTES 
### Para executar os testes do Laravel, utilize o comando Artisan:

php artisan test


### DOCKER SUBIU, MAS AS PORTAS ESTÃO OCUPADAS?
kill -9 $(lsof -t -i :PORT_NUMBER)
