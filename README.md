# ashweb20-team-team-c
ashweb20-team-team-c created by GitHub Classroom

Blue Lake Real Estates - TEAM C.
The project is carried out by a team of 5 students taking Web Technologies course in fall 2020. 
Team C is developing a data powered website to help a real estate company facilitate the easy renting and selling of real estate properties.
The web application is expected to help individuals sell, purchase and rent houses via a platform from the comfort of their homes.

Main functionalities:
Allow company advertise apartments for sale and rent
Allow company to connect real estate agents to customers
Allow customers advertise their apartments on the company's platform
Allow customers to make booking arrangements remotely.

WEBSITE URL:
Kindly find the url of the application deployed to azure here: http://teamc.uksouth.cloudapp.azure.com
To know more about the web application and the team profile, kindly visit: https://webtechnologiesteamc.wordpress.com/

NOTE:
Customers can sign up and login to enjoy the company's services. Company admin logs in directly with an existing username and password (to be provided by
the team), and has the option
to reset credentials upon first login.

DURATION:
The project started on 17th September and has successfully ended on 23rd November 2020, pending further improvements beyond the course.

This section file consists of the steps needed to set up a server to run the project.

ON XAMPP - localhost:
Xampp needs to be installed. 
It is advisable to keep the servername as "localhost" and the password remaining as an empty string ("") by default.
The project files need to be kept in the htdocs folder - c:\Users\xampp\htdocs\.
A folder needs to be created in the htdocs folder, where the repository is cloned into to have all the files of the project appear in the htdocs of the localhost.
The database has to be initialised using the database file (bl_2022.sql) included in the project files. The database should be initialised in the phpmyadmin, or have it as
a running sql file on your computer.
With this, you can have the project running on the localhost server. You just need to create an account, and then have a wonderful user experience!

ON MICROSOFT AZURE VIRTUAL MACHINE
A virtual machine is needed to be created.
On azure, one can use the LAMP server, which is similar to the XAMPP server on localhost. 
A connection needs to be established via the ssh terminal to the virtual machine.
The repository can then be cloned into the htdocs of the server by navigating into its htdocs directory - /opt/bitnami/apache/htdocs/
Now, the database needs to be accessed from the location and computer and imported into bitnami using the default bitnami password.
Now, an environment variable is needed to successfully connect the database and make the web application fully functional. 
The password field in the database connection needs to be catered for using the environment variable, which will be set with the bitnami password,
in the /opt/bitnami/apache/conf folder. specifically httpd.conf file.
Apache can now be restarted, amd the web application home page can be refreshed to test!



