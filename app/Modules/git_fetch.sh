#!/bin/sh

for repo in Campus Core FileX Gakko Himawari Jinji Kagi Kantoku Menus NewsDesk Origami Profiles Setup; do
	(cd "${repo}" && git fetch --all && git reset --hard origin/master)
	cd ../
done
