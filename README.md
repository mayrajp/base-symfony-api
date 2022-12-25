Base system for start symfony projects

The system aims to serve as a basis for creating other projects, whether web, api or both. Contains essential settings like docker, jwt, redis, basic controllers, tests, test coverage, cs fixer, initial insomnia, among others...Enjoy :D

<hr/>

To run project: 

- Create .env :  cp .env.example .env
- Run start-dev.sh
- Run run/install-dev
- To access the container bash : sudo docker compose exec -it base_app bash

Create User:

- Inside the container run command bin/console `app:new:user`

To open project on browser:

- http://localhost:8181 
- if you want to login on web : http://localhost:8181/login
- if you want generate token login on API: http://localhost:8181/api/login_check

To run tests (inside container):

- bin/phpunit

To run cs-dixer (outside container)

- run/cs-fixer

***Warning**: If you need to regenerate the JWT key, run this command inside the container:
- bin/console lexik:jwt:generate-keypair --overwrite
