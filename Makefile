DIR = /c/xampp/htdocs/mine/hacks/
SRC = src/

all: 	login home search products users

login: normalize global favicon
	cp $(SRC)login.* $(DIR)

home: normalize global favicon
	cp $(SRC)home.* $(DIR)

search: main normalize global favicon
	cp $(SRC)search.* $(DIR)

products: normalize global favicon
	cp $(SRC)products.* $(DIR)

users: user global normalize favicon
	cp $(SRC)users.* $(DIR)

user: container
	cp $(SRC)user.php $(DIR)

product : container normalize
	cp $(SRC)product.php $(DIR)

main: product defined
	cp $(SRC)main.php $(DIR)

container:
	cp $(SRC)container.php $(DIR)

favicon:
	cp img/alala.png $(DIR)img/

normalize:
	cp $(SRC)normalize.css $(DIR)

global:
	cp $(SRC)global.css $(DIR)

defined: 
	cp $(SRC)private/defined.php $(DIR)private/

clean:
	rm -f $(DIR)*.html
	rm -f $(DIR)*.php
	rm -f $(DIR)*.css
