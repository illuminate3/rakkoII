#!/bin/sh

clear

echo "----------------------------------------------------"
echo "git fetch for all repos"
echo "----------------------------------------------------"

path=~/Sites/laravel/app/Modules/

echo "----------------------------------------------------"
echo "fetch and reset Github"
echo "----------------------------------------------------"

for repo in Core FileX Himawari Kagi Kantoku Menus NewsDesk Origami Profiles
do

	cd ${repo}

	git fetch --all
	git reset --hard origin/master

#	cd $path
	cd ..

done

echo "----------------------------------------------------"
echo "fetch and reset Gitlab"
echo "----------------------------------------------------"

for repo in Campus Gakko Jinji Setup
do

	cd ${repo}

	git fetch --all
	git reset --hard origin/master

#	cd $path
	cd ..

done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
