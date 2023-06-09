# Desafio Liberfly

## **Informações sobre o ambiente**

- PHP v8.0
- Laravel v9.19
- Banco de dados: MySql 8.0

## Descrição
Desafio tecnico apresentado pela Liberfly para o processo seletivo de uma vaga de Desenvolvedor Backend

A finalidade do teste é de apresentar os conhecimentos no desenvolvimento de uma Api Restfull, apresentando conceitos como response em Json, FormRequest, DesignPatterns (Services/Repositories), Testes de Feature.

Para instalar e testar o projeto siga os passos a seguir:

```
## Instalação do projeto
O projeto deverá ser rodado de forma direta (necessário o PHP8, Composer2 e MySql instalado na maquina).
```

#### Clonando o projeto.
```shell
git clone git@github.com:wesleysilva059/desafio-liberfly.git
```

#### Acesse a pasta do projeto.
```shell
cd desafio-liberfly
```

## Rodando o projeto localmente
#### Instale as dependências.
```shell
composer install
```

#### Criar arquivo de configuração.
Execute o comando abaixo para criar o seu arquivo `.env` a partir do `.env.desafio`.
```shell
cp .env.desafio .env
```
Após a criação do seu `.env` valide as suas configurações de banco de dados para prosseguirmos ao próximo passo.


#### Gere a chave de segurança do ‘software’.
```shell
php artisan key:generate
```                                  
#### Gere a chave do JWT.
```shell
php artisan jwt:secret
``` 

#### Intale as tabelas e informações inicias, utilizando **migration** e **seeds**
```shell
php artisan migrate --seed
``` 

#### Criar a documentação do Swagger.
```shell
php artisan l5-swagger:generate
```

#### Inicializando o software.
```shell
php artisan serve
```

#### Para acessar a documentação Swagger, abra no navegador o seguinte link.
```shell
http://127.0.0.1:8000/api/documentation
```

#### Para a autenticação no sistema, use o usuario criado na seeder
```shell
email admin@admin.com
senha password
usar a rota /api/login e obter o bearertoken necessario a execução das rotas.
```

#### Para execução dos testes unitários, rode o seguinte comando.
```shell
php artisan test
```

#### Lista de Rotas
```shell
| Method | URI                                          
|--------|----------------------------------------------
|POST    | api/login                                   
|POST    | api/logout                
|POST    | api/me                                
|POST    | api/refresh                                             
|POST    | api/products/store                
|GET     | api/products/                             
|GET     | api/products/show/{id}                                
|DELETE  | api/transactions/destroy/{id}                                
```
