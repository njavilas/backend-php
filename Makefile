include .env

.PHONY: init-db

env:
	@echo "#Default env for compose file" > .env
	@echo "MYSQL_ROOT_PASSWORD=organization" >> .env
	@echo "MYSQL_DATABASE=organization" >> .env
	@echo "MYSQL_USER=app" >> .env
	@echo "MYSQL_PASSWORD=app" >> .env
	@echo "MYSQL_HOST=192.168.1.105" >> .env
	@echo "MYSQL_PORT=3306" >> .env

init-db:
	pv config/init.sql | mysql -u root -p $(MYSQL_ROOT_PASSWORD) -h $(MYSQL_HOST) -P $(MYSQL_PORT)
	echo "OK"