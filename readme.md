# Information

This is project MY-SMS of FIBO... 

# Environment requiments
1. PHP 7.2 up with extension mysql
2. npm 5.6 up
3. yarn
4. composer

# After clone source code
```
$ cd <project root directory>
$ composer install
```
```
$ cp .env.example .env
$ php artisan key:generate
$ php artisan config:cache
```

# Coding convention
1. File name
    
    | file        | type           | convention  |
    |  JS         | file			|use kebab case, e.g: `trade.js`, `finance-deposit.js` |
    | css 		  | file   			| use kebab case e.g: `login.css`, `custom.css|
2. Variable name
    
    | code | type | convention |
    | --- | --- | --- |
    | php | variable | camelCase, e.g: `$name`, `$numberOfUsers` |
    |    | class    | camelCase and uppercase first character, e.g: `TradeComtroller`|
3. Git note
    1. Create new branch for each task / topic / feature **BEFORE** development
    3. 
    