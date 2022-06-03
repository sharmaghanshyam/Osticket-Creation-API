# Osticket-Creation-API
Osticket core file to create ticket from another domain
Before you can start using the API you will need to do some configuring in osTicket.  

1. Log into your osTicket installation with your admin account. and go to Admin panel -> Manage -> API Key
2. On the right click on "Add New API Key".
3. There are several things that you need to enter here.  First is the IP address of the source where the request will originate from. 
   This can be the server IP address assigned to your server that hosts the software. 
4. Next you will want to check "Can Create Tickets (XML/JSON/EMAIL)".  
5. Then under "Admin Notes" put a note so that in the future you can go in and see what this API key was made for.  
6. Click on 'Add Key'
7. You will get the API key.


8. Open the file ost-api.php on line 19. Paster this API key.
9. Replace 'yourdomain.com' lines with you corresponding domains.
10 'ost-api.php' file is standrad file we have just modified it as per the requirement.
 
 
 
 Ready to Use API
 1. Get Ticket Number
 2. Get Client Tickets
 3. Create Ticket
 4. Reply Ticket
 5. Create Ticket List ( Multiple Tickets created in 1 call)
 6. Reply Ticket List ( Multiple Tickets reply in 1 call)
 7. Create User
 
 
 
 
 
If you still have any issue contact me - jumboteam726@gmail.com (Lucky)
	

If this is worth for you please buy a coffee for me @ jumboteam726@gmail.com (PayPal)



