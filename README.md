## 

`./bin/console messenger:consume -vv` || `./bin/console messenger:consume -vv async_priority_high async` ==> consume messages (worker)

`./bin/console config:dump framework messenger` ==> exemple config

`./bin/console debug:config framework messenger` ==> current config

`./bin/console messenger:failed:show` ==> show failed message

`php bin/console debug:container --show-arguments debug.traced.messenger.bus.default.inner` ==> show middlewares

`./bin/console messenger:failed:retry --transport=failed -vv` || `./bin/console messenger:failed:retry --transport=failed -vv --force` ==> retry

`./bin/console debug:container messenger_audit` ==> information for service (monolog.yaml) 

`touch var/log/messenger.log` ==> create messenger.log

`tail -f var/log/messenger.log` ==> run messenger.log



```sudo apt-get update

sudo apt-get install supervisor

supervisord -v

sudo service supervisor start

sudo service supervisor status

sudo service supervisor stop

cd /etc/supervisor/

sudo ln -s ~/Desktop/messenger/config/messenger-worker.ini /etc/supervisor/conf.d
 
ls /etc/supervisor/conf.d/

ls -la /etc/supervisor/conf.d/

sudo nano /etc/supervisor/conf.d/```

 
