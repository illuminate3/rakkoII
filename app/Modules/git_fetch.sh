#!/bin/sh

clear

#path=~/Sites/laravel/app/Modules/
path=..

echo "----------------------------------------------------"
echo "fetch and reset Github"
echo "----------------------------------------------------"

#for repo in Core Filex Himawari Kagi Kantoku Menus Newsdesk Origami Profiles
for repo in Core Kagi Kantoku Menus Origami Profiles
do

	cd ${repo}

	echo "----------------------------------------------------"
	echo ${repo}
	echo "----------------------------------------------------"

	git fetch --all
	git reset --hard origin/master

	cd $path

done

echo "----------------------------------------------------"
echo "fetch and reset Gitlab"
echo "----------------------------------------------------"

#for repo in Campus Gakko Jinji Setup Shisan
for repo in Hanso Kyaku Nenji Seisan Taxon Third Warehouse
do

	cd ${repo}

	echo "----------------------------------------------------"
	echo ${repo}
	echo "----------------------------------------------------"

	git fetch --all
	git reset --hard origin/master

	cd $path

done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
