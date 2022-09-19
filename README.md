# Environment
docker-compose up --build -d
docker exec -it php_unit_course_web_1 bash
composer require phpunit/phpunit:5.6
composer dump-autoload -o

# Alias
alias phpunit="./vendor/bin/phpunit"

