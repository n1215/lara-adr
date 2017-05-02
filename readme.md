# Action-Domain-Responder Pattern with Laravel
- LaravelでADRパターンを実践する例
- 共通のDomainに対してResponderを入れ替えて、HTML, JSONのHTTPレスポンス + コンソールコマンドを実装


# Web API

    php artisan serve

- http://localhost:8000/api/users/1
- http://localhost:8000/api/users/2
- http://localhost:8000/api/users/3

### Classes
- Domain: \App\Domains\Users\UserShowUseCase
- Action: \App\Http\Controllers\Api\Users\UserShowAction
- Responder: \App\Http\Responders\UserShowJsonResponder

# Web HTML

    php artisan serve

- http://localhost:8000/users/1
- http://localhost:8000/users/2
- http://localhost:8000/users/3

### Classes
- Domain: \App\Domains\Users\UserShowUseCase
- Action: \App\Http\Controllers\Web\Users\UserShowAction
- Responder: \App\Http\Responders\UserShowHtmlResponder


# Console
- php artisan user:show 1
- php artisan user:show 2
- php artisan user:show 3

### Classes
- Domain: \App\Domains\Users\UserShowUseCase
- Action(Command): \App\Console\Commands\Users\UserShowCommand
- Responder: \App\Console\Commands\Users\UserShowConsoleResponder



# 参考
- [pmjones/adr](https://github.com/pmjones/adr)
- [Radar.Project](https://github.com/radarphp/Radar.Project)
- [Presentation Domain Separation](https://martinfowler.com/bliki/PresentationDomainSeparation.html)
- [Single Action Controllers](https://laravel.com/docs/5.4/controllers#single-action-controllers)
- [Lumen/Laravel Action-Domain-Responder(ADR)アプローチ](http://qiita.com/ytake/items/db8cb64493f08f5b9706)
