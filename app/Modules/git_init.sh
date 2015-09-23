#!/bin/sh

clear

echo "git init and git add origin for GitHub repos"

for repo in Core FileX Himawari Kagi Kantoku Menus NewsDesk Origami Profiles; do
	(cd "${repo}" && git init && git remote add origin https://github.com/illuminate3/"${repo}".git)
	echo "${repo}"
	cd ../
done

echo "git init and git add origin for Gitlab repos"

for repo in Campus FileX Gakko Setup; do
	(cd "${repo}" && git init && git remote add origin git@dev.cogents.io:crichter/"${repo}".git)
	echo "${repo}"
	cd ../
done

echo "done"
