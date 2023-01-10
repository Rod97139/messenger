## 

`./bin/console messenger:consume -vv` || `./bin/console messenger:consume -vv async` ==> consume messages (worker)

`./bin/console config:dump framework messenger` ==> exemple config

`./bin/console debug:config framework messenger` ==> current config

`./bin/console messenger:failed:show` ==> show failed message

`./bin/console messenger:failed:retry --transport=failed -vv` || `./bin/console messenger:failed:retry --transport=failed -vv --force` ==> retry

