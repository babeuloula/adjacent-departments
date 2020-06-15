hooks:
	echo "#!/bin/bash" > .git/hooks/pre-commit
	echo "make check" >> .git/hooks/pre-commit
	chmod +x .git/hooks/pre-commit

check:
	make phpcs
	make stan

phpcs:
	vendor/bin/phpcs

stan:
	vendor/bin/phpstan analyse src tests --level max

phpunit:
	vendor/bin/phpunit ./tests