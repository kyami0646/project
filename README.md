# Typing game with national flags
#### Video Demo:  <URL HERE>
## Why did you decide to create this application?
In 2021, the Tokyo Olympics were held in Japan. At that time, less than 200 countries entered the games. I was not able to be moved by this moving moment. The reason is that I did not know the flags and the names of the countries. To solve this problem, I created a game to improve my typing skills, as well as the flags and names of the countries. By playing this game, you will be able to improve all your skills.
### Technology used.
- HTML
- css
- JavaScript
- php
- SQL
  
### Login function
First, we implemented a login function to identify the user. This is done using php. To register the user, we used the HTML form function to receive input from the user. The input is stored in a session using the session function of php. If the value entered is not invalid, it stores this information in the database. Duplicate email addresses will also be checked at this time.Using this stored information, the login is performed: the information entered in the form is checked against the information stored in the database, and if it matches, the user is logged in.
  
### Typing game
 The typing game was created in JavaScript, using the keydown event to receive keyboard input from the user. I also made it so that the typed characters are displayed in red. I was able to achieve this by assigning typed characters to typed and untyped characters to untyped. By implementing the timer function, we were able to create a time limit of one minute. Also, when the time limit is over, you can play again by pressing the reset button.
