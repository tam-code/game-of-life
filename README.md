# Game of life
The project based on framework Symfony 5 and php 8.0.

## Start the project
The project has docker-compose ready to use.

```
## Start install the docker container ##
docker-compose up -d
docker-compose exec php composer install
```

After success building, you can access the project by console command.
```
docker-compose exec php  bin/console game-of-life
```
**_Press Enter is enough to create a new generation._**


## Rules adaption
The rules built as services (handlers) in Symfony.
Every service should be tagged in service App\Service\Cell\CellEvolve e.g.

```
#config/services.yaml

services:
...
    App\Service\Rules\NewRule
        ...
        tags:
            - { name: 'app.rules', priority: 5 }
```

Every Rule Service should implement the RuleInterface.
