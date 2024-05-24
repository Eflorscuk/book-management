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

Acesse o projeto
[http://localhost:8989](http://localhost:8989)


