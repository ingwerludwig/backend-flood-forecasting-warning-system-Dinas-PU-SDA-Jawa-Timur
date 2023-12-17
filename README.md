<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Repository

Backend project Repository for Flood Forecasting Warning Sistem Dinas PU Sumber Daya Air Jatim <br>

## Tech Stack For Flood Forecasting Warning System Web Monitoring
| Web Development                                    | Artificial Intelligence                         |
|----------------------------------------------------|-------------------------------------------------|
| [![Laravel][Laravel.com]][Laravel-url]             | [![Python][python.com]][python-url]             |
| [![MySQL][mysql.com]][mysql-url]                   | [![Tensorflow][TensorFlow.com]][TensorFlow-url] |
| [![React][React.com]][React-url]                   | [![Flask][Flask.com]][Flask-url]                |
| [![TailwindCSS][TailwindCSS.com]][TailwindCSS-url] | [![Keras][Keras.com]][Keras-url]                |

## Requirements for This Back-End Repository
* [PHP 8.1](https://www.php.net)
* [MySQL](https://www.mysql.com)
* [Laravel 9](https://laravel.com)

## Getting Started
1. Clone this repository
```
git clone https://github.com/ingwerludwig/web-flood-forecasting-warning-system-Dinas-PU-SDA-Jatim.git
```
2. Install All Dependencies
```
composer install
```
3. Copy the .env.example to .env
```
cp .env.example .env
```
4. Generate API Key
```
php artisan key:generate
```
5. Generate JWT Secret
```
php artisan jwt:secret
```
6. Adjust your .env with your environment
7. Start the application
```
php artisan serve
```
8. Open new terminal, and start the Cronjob
```
php artisan schedule:work 
```

## Web Endpoint Documentation
https://www.postman.com/myprivatepersonal/workspace/ffws-api-endpoint-testing/collection/26715144-6bb171e5-e1f5-4df6-842c-b0e6417eb53f?action=share&creator=26715144

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[Laravel.com]: https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[mysql.com]: https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white
[mysql-url]: https://laravel.com](https://www.mysql.com)https://www.mysql.com
[python.com]: https://img.shields.io/badge/python-3670A0?style=for-the-badge&logo=python&logoColor=ffdd54
[python-url]: https://www.python.org
[TensorFlow.com]: https://img.shields.io/badge/TensorFlow-%23FF6F00.svg?style=for-the-badge&logo=TensorFlow&logoColor=white
[TensorFlow-url]: https://www.tensorflow.org
[React.com]: https://img.shields.io/badge/react-%2320232a.svg?style=for-the-badge&logo=react&logoColor=%2361DAFB
[React-url]: https://react.dev
[Flask.com]: https://img.shields.io/badge/flask-%23000.svg?style=for-the-badge&logo=flask&logoColor=white
[Flask-url]: https://flask.palletsprojects.com/en/3.0.x/
[TailwindCSS.com]: https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white
[TailwindCSS-url]: https://tailwindcss.com
[Keras.com]: https://img.shields.io/badge/Keras-%23D00000.svg?style=for-the-badge&logo=Keras&logoColor=white
[Keras-url]: https://keras.io/api/
