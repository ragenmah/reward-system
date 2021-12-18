# Technology used : 
   Laravel, JQquery and ajax
## Question 1 - Visualize Solution and PHP Coding
    Here I have created the reward system. The output is as following:
    
![image](https://user-images.githubusercontent.com/30024247/146636491-0ebc54a5-5424-4b98-9d7f-01859d4da211.png)

    The output shows that when ther is two users and if they clicked "complete order" button the rewards point and remaining points will be shown . Also the reward points will be saved in the database with their issued date, rewarded price.

# uml design

![rewards](https://user-images.githubusercontent.com/30024247/146636264-76a4036f-8bc7-43aa-af04-6d444ff67195.jpg)
# schema design 

![schema](https://user-images.githubusercontent.com/30024247/146636241-bb77cbdb-12a5-430a-952d-658f9391d868.JPG) 

# Question 2 - MySQL Query
  In this problem I have created the one sql query and shown in the views in following ways:
  ![image](https://user-images.githubusercontent.com/30024247/146636020-4504f0a2-19b6-4930-a043-6e8f1415c009.png)

## Question 3 - Calculation 
 for this question, I have calculate the tax amount in MYR as shown in following :
 
![image](https://user-images.githubusercontent.com/30024247/146636112-48077333-c63f-40c1-a2cc-957f60399c0e.png)

## Project support 
   To run the project follow the following steps
   1. Import the sql database file from the given link : 
        https://github.com/ragenmah/reward-system/blob/master/question2.sql
   2. After the importing the sql file, Run the following commands if necessary:
   3. php artisan key:generate (if needed)
   4. php artisan migrate
   5. php artisan db:seed
   6. php artisan serve
