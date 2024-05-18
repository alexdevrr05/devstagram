<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Comando con el cual se creó el proyecto
```
composer create composer create-project laravel/laravel devstagram
```

Después de que creamos la base de datos y colocamos en el `.env` file las variables, ejecutamos:
```
php artisan migrate
```


Comando para no tener que escribir el path del binario `sail` (esta linea se coloca en el bash o zsh, depende qué usemos): 
```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

