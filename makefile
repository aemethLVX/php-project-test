install:
	composer install

git-log:
	git log --pretty=oneline

lint:
	composer run-script phpcs -- --standard=PSR12 src bin