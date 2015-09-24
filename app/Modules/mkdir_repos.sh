#!/bin/sh

clear

echo "----------------------------------------------------"
echo "mkdir Github"
echo "----------------------------------------------------"

for repo in Core Filex Himawari Kagi Kantoku Menus Newsdesk Origami Profiles
do
	mkdir "${repo}"
	echo "${repo}"
done

echo "----------------------------------------------------"
echo "mkdir Gitlab"
echo "----------------------------------------------------"

for repo in Campus Gakko Jinji Setup
do
	mkdir "${repo}"
	echo "${repo}"
done

echo "----------------------------------------------------"
echo "done"
echo "----------------------------------------------------"
