# ALB
####Introduction
In this session we will give an overview of Databases/SQL and how it relates to Predix, deploy an application, and then create and bind a databse service to the application.

####Getting Started
Here are some helpful setup links steps and instructions to get you up and running on cloud foundry and Predix

#####Predix credentials
You will need a Predix account prior to accessing the service.
To sign up for an account, use this form:

https://www.predix.io/registration/

To expedite the processing of your account registration, use your GE email address.

#####Cloud Foundry Command Line Interface
The Cloud Foundry Command Line Interface is what you will use to interact with Predix from the command line.

Download and install here:
https://github.com/cloudfoundry/cli#downloads

#####Code Editor
Although you can use applications such as Text Editor, now would be a good time to download the code editor of your choice.

Some options include:
Atom :

https://atom.io/

Sublime :

https://www.sublimetext.com/3

Notepad++ :

https://notepad-plus-plus.org/download/v6.9.1.html

#####Git
Github is an SVN tool used for mass collaboration to build software. Resources, such as seed applications, for Predix and other open source systems are located on Github. Git is the tool used to copy software from a Git hub repository, as well as save updated versions, branch, etc. via the command line.

Download and install here:
https://git-scm.com/

#####Proxy
The external instance of Predix will not allow you to connect when on BLUESSO without setting your proxy.

Windows:
Go to the command line, type:
`
set HTTP_PROXY=http://cis-americas-pitc-ffldz1.proxy.corporate.gtm.ge.com/
set HTTPS_PROXY=http://cis-americas-pitc-ffldz1.proxy.corporate.gtm.ge.com/
set http_proxy=http://cis-americas-pitc-ffldz1.proxy.corporate.gtm.ge.com/
set https_proxy=http://cis-americas-pitc-ffldz1.proxy.corporate.gtm.ge.com/
`

Mac:
Go to terminal, type:
`export HTTP_PROXY=http://cis-americas-pitc-ffldz1.proxy.corporate.gtm.ge.com:80/`

#####Predix API Endpoint
`https://api.system.aws-usw02-pr.ice.predix.io`

####Our Application

1. Create a new folder on your computer
2. Open your command line application (CMD on Windows, Terminal on Mac)
3. Navigate to that new folder location
4. Clone the template php application using the following command:
`git clone https://github.com/krosine/ALB.git`

You will now see a new folder called 'ALB' with a index.php and README.md file inside. You can open that folder location using whatever text editory you installed above.

####Log Into Predix

1. Open your command line application (CMD on Windows, Terminal on Mac)

2. Set your proxy with the applicable command above

3. Log into Predix
`cf login`

4. Enter the API endpoint (listed above) if prompted for it.

5. Enter your email and password, which is the credentials you use to access Predix.io

6. Select a space, if prompted

####Push your application to Predix

1. On the command line, navigate to the folder you created above, where index.php is located
   `cd PATH_TO_FOLDER`

2. Once at your folder, you will push your application
   `cf push MYAPP -m 128M -b https://github.com/sethdesantis/php-buildpack`

   #####Explanation:

   `cf push MYAPP` : this is the basic command to push an application, replace MYAPP with a name that will be unique across all of Predix.
   
   `-m 128M` : an application usually includes a manifest.yml file that specifies application details such as memory allocation. In this case there is no manifest.yml file so we need to tell Cloud Foundry how much memory to allocate for the application.
   
   `-b https://github.com/sethdesantis/php-buildpack` : although Cloud Foundry is usually smart enough to detect the language of your application and deploy the appropriate buildpack, sometimes you will want to specify your own buildpack. In this case, we are specifying a buildpack with has PHP configured with the files necesary to connect to a Postgres database.

3. Once the push is complete, open up the page in your web browser, the url will be:

   http://MYAPP.run.aws-usw02-pr.ice.predix.io/

   Where MYAPP is the name you gave it when pushing.

4. You will see that your page is displayed, but there is a database error.

####Create a database service and bind it to your application

1. Create a Postgres Database Service

   `cf create-service postgres shared-nr MYSERVICE`

   #####Explanation:

   `postgres`  : is the name of the service we are creating
   `shared-nr` : is the plan
   `MYSERVICE` : is the name you will give this Service

   ######Tip: You can view all available services with their plans and description by typing:
   `cf marketplace`

2. Bind the service to your application

   `cf bind-service MYAPP MYSERVICE`

   #####Explanation:
   `MYAPP` : is the name of the application that previously created and pushed to Predix
   `MYSERVICE` : is the name of the service we just created

   You will see a message about restaging your application, we wont do this because we need to get the database credentials and enter them in your application code.

4. Get your database credentials by reviewing the app you bound it to

   `CF env MYAPP`

   #####Explanation:
   This command will give you all of the environmental variables of your application. Since we have bound our database service to the application, we can get the credentials (username, password, database, host) we need.

   For the data that is outputted from this command, look for the values that are labeled:
   database, host, user, password

   And copy these values into your code into the respective variables, in between the single quotes.
   $dbname, $host , $user, $pw

5. With your PHP code now updated, let's push it again to Predix using the same Cloud Foundry command you used before:

   `cf push MYAPP -b https://github.com/sethdesantis/php-buildpack`
   You can use the same app name you used the first time.

6. Once the push is complete, open up the page in your web browser, and you will see the error message is gone and your database connection has been made.
