#!/bin/sh

clear

path=~/Sites/laravel/app/Modules/

echo "----------------------------------------------------"
echo "git init and git add origin for GitHub repos"
echo "----------------------------------------------------"

for repo in Core FileX Himawari Kagi Kantoku Menus NewsDesk Origami Profiles
do

	cd ${repo}

	git init
	dir=`echo "$repo" | tr '[:upper:]' '[:lower:]'`
	echo $dir
	git remote add origin https://github.com/illuminate3/$dir.git

	cd $path

done

echo "----------------------------------------------------"
echo "git init and git add origin for Gitlab repos"
echo "----------------------------------------------------"

for repo in Campus Gakko Jinji Setup
do

	cd ${repo}

	git init
	dir=`echo "$repo" | tr '[:upper:]' '[:lower:]'`
	echo $dir
	git remote add origin git@dev.cogents.io:crichter/$dir.git

	cd $path

done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
