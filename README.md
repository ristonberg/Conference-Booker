# Conference-Booker
A Web application to book conference rooms using PHP and MySQL
<hr>
<h5>CS:4400:0002, Database Systems, Team 5</h5>
<hr>
<h3>User Requirement Specification (URS)</h3>

Here are functions with their input, validation, and output.

<h4>For All Users:</h4>

•	Log in:<br>
Input: 		user email and password<br>
Validation: 	check if input is a match in user database<br>
Output: 	bring user, and post the input to overall page if there’s a match<br><br>

•	Start Session<br>
Input:		user email and password posted from log in<br>
Validation:	check how much info we have an the user<br>
Minimize Output:	put user (ID, first name, last name, email, password) to session.<br>
Optional Output:	also put (birthdate, age, gender) to session if it’s in database<br><br>

•	Log out:<br>
Input: 		NULL<br>
Validation: 	NULL<br>
Output: 	destroy session, bring user to login page.<br><br>


•	Sider bar display:<br>
Input: user 	email and password <br>
Validation: 	user’s rank<br>
Output: 	different sidebars for different ranks of user<br><br>

•	Agenda display<br>
Input: 		JSON objects, which includes room ID, start time, end time<br>
Validation: 	if the appointments is in the future<br>
Output: 	display all upcoming appointments on a jQuery calendar<br><br>

•	Profile display<br>
Input:		User ID<br>
Validation:	see what info do we have on the user<br>
Minimize Output:	first name, last name, email<br>
Optional Output:	birthdate, age, gender<br><br>

•	Edit profile<br>
Required Input:	email (not editable by user, retrieved from session)<br>
Optional Input:	birthdate, age, gender, <br>
Validation:	if input attributes are not null <br>
Output:	update user info at user database<br><br>

•	Search room<br>
Input: 	Building, Date, Start time, duration, Internet, mic, chalkboard/whiteboard, screen, computer, size<br>
Validation:	check available and qu<br><br>




<h4>For Admin/Manage Only:</h4>

•	Add New User:<br>
Required Input: first name, last name, email, and password<br>
Optional Input: rank, birthdate, age, gender.<br>
Minimize: user’s rank<br>
Output: insert a new user into user database; admin may set him as a manager<br><br>

•	Manage Appointments:<br>
Input: User ID<br>
Validation: user’s rank<br>
Output: appointments of users created by the user, able to delete an appointment, appointment info include appointment ID, Room ID, User ID, Date, and time.<br><br>


<hr>


