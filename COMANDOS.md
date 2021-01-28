<? php
## 1 - Ambiente de Desenvolvimento Atualizando/instalando o Laravel
- Instale o Composer
    https://getcomposer.org/download/

- Atualize/Instale o NOJE.JS
    https://nodejs.org/en/download/   instale a versão LTS equivalente ao seu sistema operacional.

- Faça o Download do Composer: # instale ou atualize.

- Baixe o cmder -  É um emulador de console

https://cmder.en.softonic.com/

- instale o vscode

    https://code.visualstudio.com/download

- instale o xampp

    https://www.apachefriends.org/pt_br/download.html

    (não ative o mysql do xampp)

- instale o Mysql 8x.
    https://www.mysql.com/downloads/

    durante o processo de instalação já ative o MySQL Workbench, Gerenciador de Banco de dados nativo do Mysql


## 2 - Instalando / atualizando o Laravel

  -  composer global require laravel/installer

λ php -v
PHP 7.4.8 (cli) (built: Jul  9 2020 11:30:39) ( ZTS Visual C++ 2017 x64 )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Xdebug v2.8.1, Copyright (c) 2002-2019, by Derick Rethans

## 3 -  Criando o projeto
Composer version 2.0.8 2020-12-03 17:20:38
PHP 7.4.8 (cli) (built: Jul  9 2020 11:30:39) ( ZTS Visual C++ 2017 x64 )

composer create-project laravel/laravel arrudacalcados

Application key set successfully.

## 4- Configurando o Banco de dados MSQL para o projeto

No seu SGBD crie o banco de dados

  - CREATE SCHEMA `arruda` DEFAULT CHARACTER SET utf8mb4 ;

## Utilize VsCode

adicione o local do diretório como workspace

C:\xampp\htdocs\arrudacalcados

- No diretorio do projeto criado no arquivo .env, atualize suas conexoes de banco de dados ex:

# .ENV

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arruda
DB_USERNAME=root
DB_PASSWORD=mila


## 5- Demais configurações

## a) - Instalando o  NPM

utilize o terminal Cmander ou outro da preferência

    - mpm install
    se não funcionar digite:
    - npm install --global cross-env
    Em seguida execute novamente o comando.
    - npm install

    obs: Se mesmo assim não funcionar:
        Invoque o nmp a partir do prompt do DOS, como administrador, pelo Bash ou pelo powershell
        Com o comando CMD.exe para abrir um prompt inline do DOS, faça seu trabalho com nmp conforme descrito acima e use exit para sair do DOS.

         - npm install --global cross-env
        Em seguida execute novamente o comando.
        -  npm install
        se ao instalar tiver aviso de vulnerabilidade execute o comando :
        - npm audit fix

 ## b) Habilitando as configurações de CSS

    Execute o comando:

     -  npm run dev

    o resultado será algo parecido com isso a seguir.

> @ development C:\xampp\htdocs\compliance
> cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --config=node_modules/laravel-mix/setup/webpack.config.js

98% after emitting SizeLimitsPlugin
 DONE  Compiled successfully in 13591ms                                                      10:10:09
       Asset      Size   Chunks             Chunk Names
/css/app.css   178 KiB  /js/app  [emitted]  /js/app
  /js/app.js  1.41 MiB  /js/app  [emitted]  /js/app

Teste a a plicação:
- ative o apache do seu terminal xampp e  teste a url

  http://localhost/compliance/public/

## 6- Implementando o Sistema de Autenticação do projeto

- O comando para implementar o Auth é o seguinte:
    Acesse o diretorio do projeto utilizando o terminal digite :
    C:\xampp\htdocs\compliance

    - composer require laravel/ui --dev

o resultado é algo parecido com o a seguir

Warning from https://repo.packagist.org: You are using an outdated version of Composer. Composer 2.0 is now available and you should upgrade. See https://getcomposer.org/2
Using version ^3.1 for laravel/ui
./composer.json has been updated
Loading composer repositories with package information
Warning from https://repo.packagist.org: You are using an outdated version of Composer. Composer 2.0 is now available and you should upgrade. See https://getcomposer.org/2
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing laravel/ui (v3.1.0): Downloading (100%)
Writing lock file
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fideloper/proxy
Discovered Package: fruitcake/laravel-cors
Discovered Package: laravel/tinker
Discovered Package: laravel/ui
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
72 packages you are using are looking for funding.
Use the `composer fund` command to find out more!

Depois digite o comando a seguir:

    - php artisan ui vue --auth

o resultado será parecido como abaixo.

Vue scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.
Authentication scaffolding generated successfully.

 php artisan make:controller Site\SiteController
 php artisan make:controller Cart\CartController
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:model Admin\Slide
 Model created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:controller Admin\PaginasController
 Controller created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:controller Admin\PapelController
 Controller created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:controller Admin\SlideController
 Controller created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:controller Admin\UsuarioController
 Controller created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:model Admin\Pagina
 Model created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:controller Pessoa\PessoaController
 Controller created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:model Admin\Papel
 Model created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:model Admin\Papel_user
 Model created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:model Admin\PapelPermissao
 Model created successfully.
 
 C:\xampp\htdocs\arrudacalcados (main -> origin)
 λ php artisan make:model Admin\Permissao
 Model created successfully.
 
 # Gerando Migrações comando Ex:  php artisan make:migration create_users_table
 # Migração para administração de Usuários
 
 php artisan make:migration create_paginas_table
 php artisan make:migration create_slides_table

 php artisan make:migration create_permissaos_table
 php artisan make:migration create_papels_table
 php artisan make:migration create_papel_users_table
 php artisan make:migration create_pessoas_table
 php artisan make:migration Create_PapelPermissao_Table
  php artisan make:migration Create_modelos_Table
  
 alterando a tabela  adicionando campos
 php artisan make:migration add_campos_table_colecoes --table=colecoes
 php artisan make:migration add_campos_table_modelos --table=modelos
 
 
 php artisan make:model Product\Product -m
 php artisan make:controller Product\ProductController

C:\xampp\htdocs\arrudacalcados (main -> origin)
λ php artisan make:model Product\Product -m
Model created successfully.
Created Migration: 2021_01_24_145355_create_products_table

C:\xampp\htdocs\arrudacalcados (main -> origin)
λ php artisan migrate
Migrating: 2021_01_24_145355_create_products_table
Migrated:  2021_01_24_145355_create_products_table (258.01ms)

 php artisan make:migration add_campos_table_products --table=products
 
 # Gerando Semeadores.
 Para gerar um semeador, execute o comando Artisan,
 php artisan make:seeder < NomearquivoSeeder > .
 
  php artisan make:seeder ProductSeeder
 
 Todos os semeadores gerados pela estrutura serão colocados no diretório:make:seeder database/seeds
 
 Você pode executar o db:seedcomando Artisan para propagar seu banco de dados. Por padrão, o db:seedcomando executa a Database\Seeders\DatabaseSeederclasse, que pode, por sua vez, invocar outras classes de semente. No entanto, você pode usar a --classopção de especificar uma classe de semeador específica para ser executada individualmente:
 
 php artisan db:seed
 
 php artisan db:seed --class=ProductSeeder
 
 λ php artisan make:controller Product\ProductController --resource
 Controller created successfully.
 

  php artisan make:model Product\Colecao
  php artisan make:model Product\Modelo
  

  palmilha
  
   'composicao'  //[NOBUQUE, CAMURÇA, VERNIZ, NAPA FLORAL...]

         
          , 'numeracao_br'   // ex.  33
          , 'numeracao_eua'  // ex.  8 convertido para americano
          , 'tamanho'     // tamanho [medio,grande]
          , 'altura'
          , 'genero'     // [MASCULINO, FEMININO, UNISSEX]
          , 'cor'        // [ PRETO,BRANCO,MARFIM]
          , 'palmilha'   // [CONFORT,TRADICIONAL PRETO BEJE MARFIM]
          , 'modelo'     // [scarpin, ana bela, sapatilha, plataforma ,...]
          , 'acessorios' // [extrais, spaike, ilhos, cardaço....]
          , 'salto'       // [fino, bloco, taça,]
          , 'solado'    // [ pvc, tr, sofort]
 

 
composer dump-autoload --optimize
composer dump-autoload -o
php artisan route:clear
php artisan route:list
php artisan route:cache


user admin
email admin@arruda.com.br
pass 12345678
