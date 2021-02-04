# Desafio: Cadastro de Funcionários

Pequena aplicação web para cadastro de funcionários
em PHP e Javascript.

O usuário poderá entrar na página e verificar uma lista de funcionários cadastrados,
com os campos Nome, CPF, Gênero e Data de Nascimento.

Em seguida, ele poderá excluir um cadastro existente e/ou inserir um novo cadastro.

## Funcionamento 

[![funcionamento do sistema de cadastro de funcionários](http://img.youtube.com/vi/vf5deGv10iM/0.jpg)](http://www.youtube.com/watch?v=vf5deGv10iM "Vídeo de funcionamento do sistema de cadastro de funcionários")
## Instalação


Para instalar a aplicação é necessário clonar o projeto do GitHub num diretório de sua preferência:

```bash
https://github.com/WenderRocha/desafio-cadastro-de-funcionarios.git
```

## Configurações

1 - importe o arquivo SQL "cadastro_funcionarios.sql" que está dentro da pasta database.

2 - Abra o arquivo config.php

3 - Defina a URL base do seu projeto.

4 - insira os dados de acesso ao seu banco de dados.

```php
//url base do projeto
define("BASE_URL",     "http://seudominio.com.br/");

//configuração para acesso ao banco de dados
define('HOST', 'localhost');
define('DBNAME', 'cadastro_funcionarios');
define('USER', 'usuario');
define('PASS', 'senha');
```

