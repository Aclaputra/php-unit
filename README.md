```bash
php artisan test
```
![](./readme-img/test-login.png)

run specific method
```bash
php artisan test --filter methodName path/to/file.php
```
or (example for ExampleTest class and test_the_application_returns_a_successful_response method)
```bash
php artisan test --filter 'Feature\\ExampleTest::test_the_application_returns_a_successful_response'
```
using phpunit directly
```
./vendor/bin/phpunit --filter 'Feature\\RegisterPersonalControllerTest::test_example'
```
references :
- Writing Tests for PHPUnit documentation : https://phpzunit.readthedocs.io/en/9.5/textui.html#command-line-options
- Using Guzzle and PHPUnit for REST API Testing : https://blog.cloudflare.com/using-guzzle-and-phpunit-for-rest-api-testing/
