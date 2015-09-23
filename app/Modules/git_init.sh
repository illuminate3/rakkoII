#!/bin/sh

for repo in Core FileX Himawari Kagi Kantoku Menus NewsDesk Origami Profiles; do
	(cd "${repo}" && git init && git remote add origin https://github.com/illuminate3/"${repo}".git)
	cd ../
done


for repo in Campus FileX Gakko Setup; do
	(cd "${repo}" && git init && git remote add origin git@dev.cogents.io:crichter/"${repo}".git)
	cd ../
done




