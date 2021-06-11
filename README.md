# gamesReview
games review coursework for web development

XAMPP PORTS:
Apache:
	main port = 80
	SSL port = 443

mysql:
	main port = 3306

=====================================================
DATABASE INFO
=====================================================
sql dump is in:
games-review\application\SQL

database name is:
"games-reviewdb"

=====================================================
CHAT
=====================================================
to start the chat server, using the command line navigate to the folder:
games-review\application\scripts

then type:
"node app.js"

a message will state the server has started.

there is one chat room for all users.

=====================================================
NOTES
=====================================================
there is a user called anon in the users table.
all comments made while logged out will be made using the anon account.

comments are review specific.

originally had multiple controllers but everything broke so went back to using just the one.
