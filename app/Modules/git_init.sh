#!/bin/sh

clear

#path=~/Sites/laravel/app/Modules/
path=..

echo "----------------------------------------------------"
echo "git init and git add origin for GitHub repos"
echo "----------------------------------------------------"

#for repo in Core Filex Himawari Kagi Kantoku Menus Newsdesk Origami Profiles
for repo in Core Kagi Kantoku Menus Origami Profiles
do

	cd ${repo}

	echo "----------------------------------------------------"
	echo ${repo}
	echo "----------------------------------------------------"

	git init
	dir=`echo "$repo" | tr '[:upper:]' '[:lower:]'`
	echo $dir
	git remote add origin https://github.com/illuminate3/$dir.git

	cd $path

done

echo "----------------------------------------------------"
echo "git init and git add origin for Gitlab repos"
echo "----------------------------------------------------"

#for repo in Campus Gakko Jinji Setup Shisan
for repo in Hanso Kyaku Nenji Seisan Taxon Third Warehouse
do

	cd ${repo}

	echo "----------------------------------------------------"
	echo ${repo}
	echo "----------------------------------------------------"

	git init
	dir=`echo "$repo" | tr '[:upper:]' '[:lower:]'`
	echo $dir
	git remote add origin git@dev.cogents.io:crichter/$dir.git

	cd $path

done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
