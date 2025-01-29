# how-to-run-test-md

```bash
docker run -it --rm -v ${PWD}:/srv/project -w /srv/project slim4-oauth2-demo-project-installer ./vendor/bin/phpunit --bootstrap ./tests/bootstrap.php tests/Domain/Scope/ScopeTest.php
```