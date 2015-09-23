#!/bin/sh

clear

echo "----------------------------------------------------"
echo "mkdir all repos"
echo "----------------------------------------------------"

for repo in Campus Core FileX Gakko Himawari Jinji Kagi Kantoku Menus NewsDesk Origami Profiles Setup; do
	mkdir "${repo}"
	echo "${repo}"
done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
