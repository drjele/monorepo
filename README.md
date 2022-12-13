# Monorepo

## Dev

### Steps

* Install [Docker](https://www.docker.com/products/docker-desktop/) to develop and run the code.
* Generate git ssh keys.

```shell
git clone git@gitlab.com:drjele/monorepo.git

rm -rf .git/hooks && ln -s ../dev/shared/git-hooks .git/hooks

cd dev/

# the next instructions allow to run git from inside containers
cp ~/.ssh/id_* shared/.ssh/
echo '#!/bin/bash' >> shared/.profile/.profile_local && \
echo 'git config --global user.name "<your-name>"' >> shared/.profile/.profile_local && \
echo 'git config --global user.email "<your-email>"' >> shared/.profile/.profile_local

cd docker/
docker compose build && docker compose up -d

# to access a container and start development
docker compose exec <container-name> sh
```

### Utilities

* The file [.profile](./dev/shared/.profile/.profile) contains aliases for quick commands.
* You can register your own aliases in the [.profile_local](./dev/shared/.profile/.profile_local) file. This file is [.gitignore](./dev/shared/.profile/.gitignore).
* To only start up one application, run `docker compose` commands and specify the compose file from `dev/docker/`.
