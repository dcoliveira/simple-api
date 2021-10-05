# simple-api
API de cadastro básico

# Primeiro clone o projeto
git clone <'url do projeto'>

# Caso nao tenha o composer, para instalar acesse:
https://getcomposer.org/download/

# Instalando projeto
1 - composer update 
2 - composer install

# Configurando arquivo Env
1 - Realize uma cópia do arquivo .env.example
2 - Edite o nome do arquivo para .env

# Banco de dados
1 - deve ser criado um banco de dados com o mesmo nome configurado no ENV simple_api
# Para criar tabelas em banco
1 - php artisan migrate

# Para gerar chave secreta
php artisan jwt:secret

# Para rodar a api
1 - php artisan serve 

# Caso ocorra algum problema 
1 - php artisan cache:clear

2 - Caso ocorra problemas referentes ao drive mysql faça:
 2.1 - abra o seu php.ini 
 2.2 - retire o comentário da linha referente ao pdo_mysql 

2 - Caso ocorra erro relacionado a biblioteca pdo_mysql rode:
    2.1 sudo apt-get --purge remove php-common
    2.2 sudo apt-get install php-common php-mysql php-cli
