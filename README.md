# xVerify API Service Class

Symfony service class for the xVerify API. 

This is modified to work in Symfony 3.x but is based on this class:
https://www.xverify.com/developer-documentation.html

#Step 1 : modify security.yml in app/config

under firewall add a new section:

        xverify:
            pattern: ^/xverify
            security: false
            
under access_control:
- { path: ^/xverify, role: IS_AUTHENTICATED_ANONYMOUSLY, requires_channel: https }

If you do not have SSL setup then use this:
- { path: ^/xverify, role: IS_AUTHENTICATED_ANONYMOUSLY }

#Step 2: modify parameters.yml in app/config

Add the following:

    xverifykey: somekey
    xverifyoptions:
        type: json
        domain: yourname.com
        
Replace the details with your actual apikey and your domain name.

#Step 3: modify parameters.yml.dist

Add the following exactly as it is below. Do you plug in your details. This is a public file but you need to add this so if you use composer for other packages you won't loose the custom parameters added.

    xverifykey: somekey
    xverifyoptions:
        type: json
        domain: yourname.com

#Step 4:

copy the files in Resources and src into the coresponding directories in your Symfony project. If a directory is missing simply create it.

#Step 5:

you would access the API www.yourname.com/xverify?phone=8035551212
