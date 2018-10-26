# Instalação

- Criar um arquivo config.ini no diretório controller (esse é o arquivo de configuração para acesso ao banco de dados)  
O arquivo deve conter a seguinte estrutura

```ini
; Main section that contains the access to the database
[main]
server = localhost
user = root
pass = joao
database = agro
```

- O próximo passo é criar um banco de dados MySQL chamado "agro" e importar a estrutura do arquivo `controller/estrutura.sql`

Existem alguns dados fictícios em `dados.sql`  que pode ser importado também



