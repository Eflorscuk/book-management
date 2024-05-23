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

Acesse o projeto
[http://localhost:8989](http://localhost:8989)

### Passos de criação do projeto
1. Criar o Model e Migration para Livros:
```sh
php artisan make:model Book -m
```
2. Inserir as colunas necessárias para 
a tabela de livros (books):
```dosini
Schema::create('books', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('author');
    $table->text('description');
    $table->string('isbn');
    $table->integer('quantity');
    $table->timestamps();
});
```
3. Rodar as Migrations no container:
```sh
php artisan migrate
```

4. Adicionar a coluna "role" (regra) na tabela "users" (usuários):
```sh
php artisan make:migration add_role_to_users_table --table=users
```

5. Inserir a nova regra na migration:
```dosini
Schema::table('users', function (Blueprint $table) {
    $table->string('role')->default('user');
});
```

6. Rode novamete a migration:
```sh
php artisan migrate
```

