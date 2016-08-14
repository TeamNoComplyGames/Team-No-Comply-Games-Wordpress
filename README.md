# CECS-300-Wordpress-Site

Made with [Yeopress](https://github.com/wesleytodd/YeoPress)

![Site Screenshot](https://files.aaronthedev.com/$/sv38z)

##How to get started with Yeopress

So I had a bit of trouble getting started using Yeopress, so here's what I did to get your own server started, and possibly git clone this repo.

####Step 1: Set up your LAMP (or whatever AMP) stack

So I use linux, and used this amazing [Digital Ocean Guide](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-14-04)

So once you do this, your going to want to take control ('chmod' or ''chown' or open an administrator file exlporer to give yourself permissions) the /var/www/html folder if you want to be able to create files and generate a project in there. **PLEASE TAKE NOTICE THAT THIS IS A BAD PRACTICE, AND YOU SHOULD NOT BE DOING THIS FOR ANY REAL PRODUCTION DEVELOPMENT**. I'm doing this because this is for a class, and it just a simple local dev server.

Next you want to create a folder in /var/www/html . I made one called /cecs300wp so the absolute path is /var/www/html/cecs300wp.

And please take not when we do generate your url for the generator will be **localhost/cecs300wp** or whatever you named your folder.

But however, we arent generating yet, next we need to set up some mysql stuff

##Step 2: Up Mysql Database for Wordpress

Next you need to follow another [Digital Ocean Guide](https://www.digitalocean.com/community/tutorials/how-to-install-wordpress-on-ubuntu-14-04) **However your going to want to stop after you finish step 1**.

So you hade to make a mysql database right? Your going to need the **Name of the databse you created, the user name and password you created for that databse** .

And after that your ready to generate!

##Step 3: Generate Yeopress

So go to the awesome [Yeopress repo](https://github.com/wesleytodd/YeoPress) and follow the how to use section.

'cd' (Change Directory) into your folder **/var/www/html/cecs300wp "Or whatever you named your folder"**

Now the generator is going to ask you for the url **localhost/cecs300wp "Or whatever you named your folder"**, just press enter for table prefix(Unless you want something custom), just press enter for databasehost(Unless you want something custom), enter the name of the database you created in step 2, enter the username of the database you created in step 2, enter the user password of the database you created in step 2, and the rest you can enter whatever you like :)

**Actually for the last steps when they ask you if you would like a theme, say yes and it should do most of step 4 for you, as long as you enter the default parameters (Just press enter)**

go to the url you entered (localhost/cecs300wp "Or whatever you named your folder") and BAM! it should all be there, just go through the usual wordpress process :)

Lastly, we're going to set up a sass based theme and livereload

##Step 4: SASS and livereload and final thoughts
####(If you clone this repo, you can skip some of these steps, just see below for usage and installing)

So awesome, you got everything set up and cool!

navigate to the wp-content/themes folder inside of your project, and this time you are going to 'git clone' the [Yeopress repo](https://github.com/wesleytodd/YeoPress) into the themes folder. navigate into there, and 'git checkout template' to switch onto the template branch.

run 'npm install', 'bower install', and 'grunt bower' to get all the dependencies installed :)

Awesome you got the super cool yeopress grunt theme now. navigate to your wordpress admin and activate it!

Nto use the themes awesome sass and livereload, first check out the awesome readme on the template branch of the [Yeoman template branch repo](https://github.com/wesleytodd/YeoPress/tree/template)

if run just 'grunt' it will start the livereload server and things. and start watching your sass files and everything :)

however, livereload was acting up for me, so if you you replace the following line:


    wp_register_script('livereload', '<%= conf.get("url") %>:35729/livereload.js?snipver=1', null, false, true);
    
    
with:


    wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
    
    
And then you restart the 'grunt' command, it should now be livereloading!


**Final Thoughts** This is just a personal guide for me, but I am open to any pull requests and things, and much thanks to the devs at yeopress, and digital ocean! 


##RequireJS

So requirejs tasks wont be working as mentioned by: https://github.com/pudgereyem/wp-theme-framework-1/blob/master/README%20Yeopress.md

The path will be incorrect, so navigate to js/globals.js. 

Change the base config path to your current directory(The whole <%> thingy doesnt work on the site, only building), e.g:
`baseUrl: "wp-content/themes/YeoPress/js",`

And change the JQuery path, to: 
`jquery: "vendor/jquery/dist/jquery"`

And you're good!

## License

Licensed under the [Apache License 2.0](http://choosealicense.com/licenses/apache-2.0/)
