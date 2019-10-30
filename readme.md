## About mygallery

Ready mygallery for used. Created with use Laravel 6. <br>
Deploy on: <br> **<http://my-gallery-laravel-6.herokuapp.com>**
___

## О блоге

Готовый галерея сделанная на  Laravel 6. <br>
Выложен на: <br> **<http://my-gallery-laravel-6.herokuapp.com>**
___

## Функционал галереи

### Функционал фронтальной части блога
Регистрация<br>
Зарегистрированные пользователи могут<br>
загружать свои фотографии и проводить с ними манипуляции,<br>
редактировать свои данные<br>
Вывод постов по категориям.


### Функционал административной части галереи
Манипуляции (блокировка, бан, удаление) с пользователями, постами, категориями и тд..<br>
Абсолютный доступ ко всем ресурсам галереи<br>
___

## Install (Установка)

git clone **<https://github.com/ruadik/mygallery.git>**

composer install<br>
yarn or npm install<br>
cp .env.example .env   - Генерация .ENV (В нем необходимо прописать имя созданной DB, логин и пароль) <br>
php artisan key:generate<br>
php artisan migrate<br>
php artisan db:seed<br>


В табличке users в поле **role_id** установите значение **2**, что означает **администратор**. <br>
Далее входите под этим пользователем и в конце URL пишите **"/admin"**: <br>
**<http://my-gallery-laravel-6.herokuapp.com/admin>** <br>
Попадете в админ панель. <br>
Пароль у всех пользователей по умолчанию: **password**
___


## License

Licensed under the [MIT license](https://opensource.org/licenses/MIT).
