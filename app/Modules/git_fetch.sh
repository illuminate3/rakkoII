#!/bin/sh

clear

echo "----------------------------------------------------"
echo "git fetch for all repos"
echo "----------------------------------------------------"

path=~/Sites/laravel/app/Modules/

for repo in Campus Core FileX Gakko Himawari Jinji Kagi Kantoku Menus NewsDesk Origami Profiles Setup
do

	cd ${repo}

	git fetch --all
	git reset --hard origin/master

	cd ..

#	dir=`echo "$repo" | tr '[:upper:]' '[:lower:]'`
#	echo $dir
#	git remote add origin https://github.com/illuminate3/$dir.git
#	cd $path

#	(cd "${repo}" && git fetch --all && git reset --hard origin/master)
#	echo "${repo}"
#	cd $path
done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
