#!/bin/sh

clear

echo "----------------------------------------------------"
echo "mkdir Github"
echo "----------------------------------------------------"

for repo in Core Filex Himawari Kagi Kantoku Menus Newsdesk Origami Profiles
#for repo in Core Kagi Kantoku Menus Origami Profiles
do
	mkdir "${repo}"
	echo "${repo}"
done

echo "----------------------------------------------------"
echo "mkdir Gitlab"
echo "----------------------------------------------------"

for repo in Campus Gakko Jinji Setup Shisan Ticket Yubin
#for repo in Hanso Kyaku Nenji Seisan Taxon Third Warehouse
do
	mkdir "${repo}"
	echo "${repo}"
done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
