## Comandos na criação

- `laravel new galeria`

(acessar pasta do projeto)

- `composer install`
- `npm install`
- `npm run dev`

auth laravel
- `composer require laravel/ui`
- `php artisan ui vue --auth`

deixar em pt BR
- `composer require lucascudo/laravel-pt-br-localization --dev`
- `php artisan vendor:publish --tag=laravel-pt-br-localization`

Link para armazenamento
- `php artisan storage:link`

instalação do Adminlte
- `composer require jeroennoten/laravel-adminlte`
- `php artisan adminlte:install`
- `php artisan adminlte:install --only=auth_views`
- `php artisan adminlte:install --only=main_views`

gerador de models e relacionamentos:

- `composer require reliese/laravel --dev`
- `php artisan vendor:publish --tag=reliese-models`
- `php artisan config:clear`

Opções:

- `php artisan code:models` (montar tudo)
- `php artisan code:models --table=Nome_Tabela` (montar tabela especifica)
- `php artisan code:models --connection=pgsql` (definir conexão para o postgres)