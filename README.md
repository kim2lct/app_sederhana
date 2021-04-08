# Applikasi Sederhana

# Feature
 1. Ui Dashboard with CRUD and Login/Register
 2. Ajax with Axios
 3. Sass,{Bootstrap}
 4. API CRUD can use POSTMAN
 5. Unit Testing

# Api 

## Header API
\_token:X5IGtkT2IwJh6oB3nzob1wjb44xCbuH2Wz1sQ4ShnKWYbrdrTI4J0rJ3VWbu 
fyi:in above just example , token will created when user login
required except  **/login**

**View All User**
route : GET: /api/user

**View User**
route : GET: /api/user/{id}

**Login User**
route:POST:/api/login
payload : {username:admin,password:admin}

**Create User**
route:POST:/api/user/register
payload : {username:admin,email:admin@gmail.com,password:admin,cpassword:admin,status:active,position:manager}

**Update User**
route:POST:/api/user/{id}/edit
{username:admin,email:admin@gmail.com,password:admin,cpassword:admin,status:active,position:manager}

**Delete User**
route:GET:/api/user/{id}/edit


## Using APP
I'm using *php artisan serve* to local sever , maybe on port 8000
if dont have any user , can register on website click register,
have fun surfing on apps.

** Thank You **