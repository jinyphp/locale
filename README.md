# Locale
본 코드는 `PHP`언어로 작성된 `composer` 페키지 입니다. 또한 `jinyPHP` 프레임워크와 같이 동작을 합니다.
지니PHP는 MVC 패턴의 웹프레임워크 입니다.


## 설치방법
composer를 통하여 설치를 진행할 수 있습니다.

```php
composer require jiny/locale
```


## 소스경로
모든 코드는 깃허브 저장소에 공개되어 있습니다.
https://github.com/jinyphp/locale

누구나 코드를 포크하여 수정 및 개선사항을 기여(contrubution)할 수 있습니다.

## 로케일값
로케일(local)은 언어나 국가등 지역등을 지정하는 상수값들을 말합니다.
다양한 언어의 코드와 고유적인 표현을 제공합니다. 또한 국가의 목록 및 언어 표현을 같이 제공합니다.


## 데이터베이스 마이그레이션 및 Seeds

seed 파일을 배포합니다.
```
php artisan vendor:publish --tag=locale-seeds

php artisan db:seed --class=Language
```
