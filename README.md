# Book-management

## Objetivo

O presente projeto tem como objetivo em construir um sistema de gerenciamento de livros utilizando Laravel e seus recursos como Migrations, Seeders, Elloquent, Blade etc. O projeto foi desenvolvido a partir do IOS do Mac e também testado no Linux Ubuntu, contudo, as configurações de ambiente foram realizadas através de containeres com Docker e Docker-compose. Para realizar autenticação, optei em usar o laravel/breeze.

## Passo a passo para rodar o projeto
Clone o projeto e entre no mesmo:
```sh
git clone https://github.com/Eflorscuk/book-management book-management
```
```sh
cd book-management/
```

Na raiz, caso esteja usando Linux, dê as devidas permissões ao projeto para que o Docker possa realizar alterações no volume local:
```sh
sudo chown -R $USER:$USER .
```

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="book-management"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Faça a build do projeto e en seguida suba os containers:
```sh
docker-compose build
```
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Por fim, gere a migrate para o banco de dados:
```sh
php artisan migrate
```

Instale o Breeze com os comandos:
```sh
composer require laravel/breeze --dev
```
```sh
php artisan breeze:install
```

Saia do container app e digite na raiz do projeto:
```sh
npm i && npm run dev
```

Em uma nova aba, volte para o container de app e execute:
```sh
php artisan migrate
```

Execute o comando para povoar a tabelas do db para testes:
```sh
php artisan db:seed
```

Caso não chame todos os seeders, experimente utilizar o comando com o nome especiífico do seeder, dessa maneira:
```sh
php artisan db:seed --class=NomeDoSeeder
```

Os logins para acessar o sistema como admin e user são, respectivamente:
```sh
login: admin@example.com
senha: admin
```
```sh
login: user@example.com
senha: user
```

Acesse o projeto
[http://localhost:8989](http://localhost:8989)

## Planejamento

Utilizei UML para gerar um diagrama de classes para verificar quais seriam as principais classes das quais eu utilizaria para o projeto, após a definição, optei em utilizar o Laravel 10 com php 8.1, por ter uma maior familiaridade com esta versão de framework e da linguagem.

Realizei a construção do ambiente em Docker e orquestração de containers utilizando docker-compose, pois, o objetivo é que, assim que terminado o projeto, o mesmo possa ser subido rapidamente para produção ou testado na máquina de outro colega sem problemas com versionamento ou OS.

Feita a construção da imagem no Dockerfile para ajustar o app em PHP e o docker-compose.yml para demais configurações de ambiente (nginx, mysql, laravel, redis, php-my-admin), comecei a construção do projeto através da crianção das migrations, indo para as models e controllers, assim como, utilizei relations para realizar as relações de tabelas (users, books, lends). Utilizei seeders para alimentação da tabela users e books para também maior agilidade no processo de desenvolvimento e mock de dados. Também fiz um sistema do qual é necessário estar autênticado para poder navegar, sendo que o mesmo possuí dois níveis: admin e usuário comum. Existem funções que somente usuários admin poderão acessar no sistema, como: criação de novos livros, exclusão, etc.

Por fim, realizei a construção das views utilizando Blade e Bootstrap para me ajudar na construção de layouts mais bonitos e responsivos. Comecei a implementação de testes com PHP Unit também.

