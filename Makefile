add :
	@git add .
status : add
	git status
commit : status
	@git commit -m "admin managment"
push : commit
	git push
