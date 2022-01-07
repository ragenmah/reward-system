# Technology used : Laravel, JQuery and bootstrap

# Installation needed

Before starting project, following installation in needed in your system:

1.  Composer
2.  XAMPP

## Project support

To run the project follow the following steps

1. First run the server using XAMPP and create the database with any name.
2. Now edit the .env file with necessary credential - to make connection with the database
3. Now run the following commands to run the project
4. php artisan key:generate (if needed)
5. composer install (if needed)
6. php artisan migrate
7. php artisan db:seed
8. php artisan serve

## Question 1 - Visualize Solution and PHP Coding

    Here I have created the reward system. The output is as following:

![home](https://user-images.githubusercontent.com/30024247/148479291-a129a584-6bf4-47c3-abc7-b2abe69a4a31.JPG)
![complete_order](https://user-images.githubusercontent.com/30024247/148479289-e9b8efad-fdce-46db-8d6f-1052c3397455.JPG)
![new_order](https://user-images.githubusercontent.com/30024247/148479293-9a887aea-949b-4600-9e61-19eaa4a46988.JPG)
![claim_confirm](https://user-images.githubusercontent.com/30024247/148479284-c77dc1e8-eb12-481f-addd-464c21bb3caf.JPG)
 Here the customer can confirm the order with the payment or without the payment. If customer choose without payment option, then that order will be in PENDING status and reward will not be added. And, if customer choose the country currency and make the payment, the status will be in COMPLETE and also reward points will be added.
 Customer can use those reward amount and comfirm the reward use.

## uml design
# Use case Diagram
![usecase](https://user-images.githubusercontent.com/30024247/148478216-6c2722b8-1c05-478b-b38b-516e2a87ee09.png?v=4&s=200)
# Class Diagram
![classdiagram](https://user-images.githubusercontent.com/30024247/148478220-ab974ac3-c2f4-4788-8736-7179d1799396.png?v=4&s=200)
# schema design
![schema](https://user-images.githubusercontent.com/30024247/148479298-d4654413-e670-469d-a9eb-1945ac1b7b00.JPG)
# Question 2 - MySQL Query

In this problem I have created the one sql query and shown in the views in following ways:
![orders](https://user-images.githubusercontent.com/30024247/148479294-292a38aa-af6b-4210-bb96-50e2219fa9be.JPG)

## Question 3 - Calculation

for this question, I have calculate the tax amount in MYR as shown in following :

![calculation](https://user-images.githubusercontent.com/30024247/148479300-2c201d96-dff0-4bfe-a53a-c1ea59338466.JPG)