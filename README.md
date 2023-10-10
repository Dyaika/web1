# API
## GET запрос на получение информации о фуме по fumo_id
http://localhost:8000/api/fumos.php?fumo_id=3

## POST запрос на добавление фумы
curl -X POST -H "Content-Type: application/json" -d '{"name":"Cirno","cost":9000}' http://localhost:8000/api/fumos.php

## PUT запрос на обновление фумы по fumo_id
curl -X PUT -H "Content-Type: application/json" -d '{"name":"Cirno","cost":5500}' http://localhost:8000/api/fumos.php?fumo_id=1

## DELETE запрос на удаление фумы по fumo_id
curl -X DELETE http://localhost:8000/api/fumos.php?fumo_id=1
