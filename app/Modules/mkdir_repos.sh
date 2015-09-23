#!/bin/sh

clear

echo "mkdir all repos"

for repo in Campus Core FileX Gakko Himawari Jinji Kagi Kantoku Menus NewsDesk Origami Profiles Setup; do
	mkdir "${repo}"
	echo "${repo}"
done

echo "done"
