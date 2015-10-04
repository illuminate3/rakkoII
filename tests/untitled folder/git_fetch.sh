#!/bin/sh

clear

echo "git fetch for all repos"

for repo in Campus Core FileX Gakko Himawari Jinji Kagi Kantoku Menus NewsDesk Origami Profiles Setup; do
	(cd "${repo}" && git fetch --all && git reset --hard origin/master)
	echo "${repo}"
	cd ~/Sites/laravel/app/Modules/
done

echo "done"
