# Php monorepo config

I created this repository as a proof of concept for a **monorepo** for **php** projects with **libraries shared through composer**.

## Production

* When building each project, use `rm -rf vendor && COMPOSER_MIRROR_PATH_REPOS=1 composer install` to have the shared libraries as hard copies.
