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
