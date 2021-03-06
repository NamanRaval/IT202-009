# Project Name: Simple Bank
## Project Summary: This project will create a bank simulation for users. They’ll be able to have various accounts, do standard bank functions like deposit, withdraw, internal (user’s accounts)/external(other user’s accounts) transfers, and creating/closing accounts.
## Github Link: https://github.com/NamanRaval/IT202-009/tree/prod/public_html/Project
## Project Board Link: https://github.com/NamanRaval/IT202-009/projects/1
## Website Link: http://nyr2-prod.herokuapp.com/Project/login.php
## Your Name: Naman Raval

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] (mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence

- Milestone 1
    - [x] (11/11/2021) User will be able to register a new account
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/register.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/14
            - PR link #2: https://github.com/NamanRaval/IT202-009/pull/36 
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141225397-05160a99-09cd-4bd2-8efb-7508cef31616.png)
                - Screenshot #1: Username, email, password, confirm password implemented. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/141225572-a592a751-df58-4555-8757-61f9d572180f.png)
                - Screenshot #2: Email is required and must be validated implemented. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/141225688-092e0db5-270b-4740-a8a6-03ab069c7aae.png)
                - Screenshot #3: Username is required implemented.
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/141225795-1ca4f6d1-b830-45cf-990d-648f48089213.png)
                - Screenshot #4: Confirm password’s match implemented. 
              - Screenshot #5: ![image](https://user-images.githubusercontent.com/90223403/141225939-2462a5eb-1dcc-4be1-92f2-5e5e60cec2a9.png)
                - Screenshot #5: Id, username, email, password (60 characters), created, modified implemented and password must be hashed implemented.
              - Screenshot #6: ![image](https://user-images.githubusercontent.com/90223403/141226139-b9141c62-8a0a-47a3-871c-82e4b39f5546.png)
                - Screenshot #6: Email should be unique implemented.
              - Screenshot #7: ![image](https://user-images.githubusercontent.com/90223403/141226290-3c59a1c5-1e06-4313-a719-e0c05cc04c19.png)
                - Screenshot #7: Username should be unique implemented.
              - Screenshot #8: ![image](https://user-images.githubusercontent.com/90223403/141354315-017c984a-a67a-45ce-95e7-e50273ce734d.png)
                - Screenshot #8: System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form implemented.
              - Screenshot #6: ![image](https://user-images.githubusercontent.com/90223403/141354851-ec99fc8b-97d1-498a-94d2-5af56f56cde3.png)
                - Screenshot #6: Validation implemented. 
                

    - [x] (10/14/2021) User will be able to login to their account (given they enter the correct credentials)
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/login.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/14
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141227204-7ccbe9ac-0a86-48ba-b237-46f695c1f2f1.png)
                  - Screenshot #1: User can login with email or username implemented.  
                - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/141227277-39fd1650-1efb-4424-84c4-1e78a16330bd.png)
                  - Screenshot #2: Password is required implemented. 
                - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/141227386-88515e57-2104-4790-aee8-1f7723176cf2.png)
                  - Screenshot #3: User should see friendly error messages when an account either doesn’t exist or if passwords don’t match.
                - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/141228497-77f734e0-5fef-4159-84e2-414b65e02772.png)
                  - Screenshot #4: User will be directed to a landing page upon login implemented. 
                - Screenshot #5: ![image](https://user-images.githubusercontent.com/90223403/141227460-a1bae765-9766-47ab-9292-0ff7953341dd.png)
                  - Screenshot #5: User should see friendly error messages when an account either doesn’t exist or if passwords don’t match.
                
                
    - [x] (11/11/2021) User will be able to logout
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/login.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/14
            - PR link #2: https://github.com/NamanRaval/IT202-009/pull/36
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141229690-3e217960-4bff-4dfc-9734-9e25acbf5fe2.png)
                  - Screenshot #1: Session should be destroyed (so the back button doesn’t allow them access back in) implemented. 
                - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/141371320-575f1114-da9d-4958-86bc-bbd310cb55ef.png)
                  - Screenshot #2: User should see a message that they’ve successfully logged out implemented and logging out will redirect to login page implemented. 

    - [x] (10/28/2021) Basic security rules implemented
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/admin/list_roles.php
            - Pull Requests: https://github.com/NamanRaval/IT202-009/pull/26 
            - PR link #1 
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141230634-1a5083c5-96ba-466f-9d9c-66bbf69297c1.png)
                  - Screenshot #1: Roles Table implemented.   
                - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/141230735-190b4d7f-b88e-4798-b39e-b682a7cb6c44.png)
                  - Screenshot #2: Function to check if user is logged in and function should be called on appropriate pages that only allow logged in users implemented.

    - [x] (10/28/2021) Basic Roles implemented
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/admin/create_role.php 
            - Pull Requests: 
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/26
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141231173-13c811db-7400-4734-9406-1bf4ab4113c8.png)
                  - Screenshot #1: Have a Roles table	(id, name, description, is_active, modified, created) implemented. 
                - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/141231225-5777cde9-8762-4fe9-bdf0-bd23c60bcbee.png)
                  - Screenshot #2: Have a User Roles table (id, user_id, role_id, is_active, created, modified) implemented. 


    - [x] (11/10/2021) Site should have basic styles/theme applied; everything should be styled
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/login.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/34
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141371892-0b2b485e-ab39-4bc0-8c12-460bf738056d.png)
                  - Screenshot #1: Site should have basic styles/theme applied; everything should be styled implemented. 

    - [x] (11/11/2021) Any output messages/errors should be “user friendly”
        -  List of Evidence of Feature Completion
           - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/home.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/36 
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141372278-d4205f8f-a9ac-4007-aeb4-aa7a5c3de674.png)
                  - Screenshot #1: Any output messages/errors should be “user friendly” and no technical errors implemented. 

    - [x] (10/14/2021) User will be able to see their profile
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/profile.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/14
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141372450-a1f14cb7-c6f0-431f-b527-653c52c893c1.png)
                  - Screenshot #1:  User will be able to see their profile implemented. 

    - [x] (10/14/2021) User will be able to edit their profile
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/profile.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/14
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141373157-214fc95d-aa81-4d76-ad10-e22e9f336e6b.png)
                  - Screenshot #1: Changing username/email should properly check to see if it’s available before allowing the change and Allow password reset (only if the existing correct password is provided) implemented. 


    
- Milestone 2
    - [x] (11/24/2021) Create the Accounts table (id, account_number [unique, always 12 characters], user_id, balance (default 0), account_type, created, modified)
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/accounts.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/54 
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/143964677-520659b8-3271-4890-962d-2949a9217c4f.png)
                - Screenshot #1 Description: Accounts Table created. 
                

    - [x] (11/26/2021) Project setup steps:
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/test_create_transactions.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/55
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/143965959-20269249-595a-4e40-b89b-925bec860371.png)
                - Screenshot #1 Description: World Account created. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/143966288-6a4d5727-01b7-4eb4-86b2-02859c95861d.png)
                - Screenshot #2 Description: System user created. 
                
    - [x] (11/26/2021) Create the Transactions table (see reference below)
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/test_list_transactions.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/55
            - Screenshots
              - Screenshot #1:![image](https://user-images.githubusercontent.com/90223403/143964891-0d2430ea-fba8-4d73-9115-d6085f47ca11.png)
                - Screenshot #1 Description: Transaction table created.
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/143965302-ed4b37a3-ebc1-4f52-8185-6bf5e3d8d672.png)
                - Screenshot #2 Description: Src/Dest, BalanceChange, TransactionType, Memo, ExpectedTotal, Created implemented. 


    - [x] (11/26/2021) Dashboard page
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/home.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/56
            - Screenshots
              - Screenshot #1:![image](https://user-images.githubusercontent.com/90223403/143966605-4168c973-7173-4c1c-9033-711934df2fbe.png)
                - Screenshot #1 Description: Dashboard Page implemented. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/143966675-115a3f76-5d1a-4fb8-9355-7a45b09bf80d.png)
                - Screenshot #2 Description: Dashboard display code. 

    - [x] (11/26/2021) User will be able to create a checking account
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/create_account.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/57
            - PR link #2: https://github.com/NamanRaval/IT202-009/pull/65 
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/143967086-12ed26cf-cb76-4caa-a711-a4e13dabad65.png)
                - Screenshot #1 Description: User can create a checking account with minimum $5.00. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/143967159-8974d4e0-7c73-4686-96df-a6f62c7be051.png)
                - Screenshot #2 Description: Random account number. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/143967682-7ebef724-670c-4b82-91c5-fe54be846073.png)
                - Screenshot #3 Description: Friendly user messages. 
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/143968028-ada52804-35df-4e6e-aaaf-16e903cf7d42.png)
                - Screenshot #4 Description: Updated Accounts table. 
              - Screenshot #5: ![image](https://user-images.githubusercontent.com/90223403/144165546-365c6801-440c-4429-a26d-312b3d9c0b63.png)
                - Screenshot #5 Description: Redirection. 
              


    - [x] (11/26/2021) User will be able to list their accounts
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/accounts.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/58
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/143977011-a6382c66-732a-4c35-910b-d79b3e4edaa5.png)
                - Screenshot #1 Description: Account number, account type and balance implemented on accounts page
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/143977266-2886eff8-4a56-4253-8f33-eb825e109b16.png)
                - Screenshot #2 Description: Limit of 5 accounts on page. 

    - [x] (11/28/2021) User will be able to click an account for more information (a.ka. Transaction History page)
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/accounts.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/59
            - Screenshots
              - Screenshot #1:![image](https://user-images.githubusercontent.com/90223403/143977666-114e61ce-eafb-4531-bea8-3f94b91fe859.png)
                - Screenshot #1 Description: Latest transaction history (10 results). 

    - [x] (11/29/2021) User will be able to deposit/withdraw from their account(s)
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link #1: https://nyr2-prod.herokuapp.com/Project/transaction.php?type=withdraw
            - Direct Link #2: https://nyr2-prod.herokuapp.com/Project/transaction.php?type=deposit 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/60
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/143977959-b8044864-11f0-4f86-93dc-741a3c75c342.png)
                - Screenshot #1 Description: Dropdown for deposit and withdraw. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/143978057-f9dfa836-e5eb-42ea-a993-1c46aca93156.png)
                - Screenshot #2 Description: Account dropdown without world account. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/143978128-741c9691-ae3b-4dfe-a698-c207c5525b20.png)
                - Screenshot #3 Description: Form to enter deposit amount with memo line. 
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/143979095-702fe12e-8d7a-4aff-8095-783b0bcb575e.png)
                - Screenshot #4 Description: All reflected on transaction history page. 
              - Screenshot #5: ![image](https://user-images.githubusercontent.com/90223403/143979199-317f064a-06e0-4387-b838-c29ea005959f.png)
                - Screenshot #5 Description: Friendly success messages.
              - Screenshot #6: ![image](https://user-images.githubusercontent.com/90223403/143979277-d38a537e-35ee-40c9-9ebd-c2703feb4b71.png)
                - Screenshot #6 Description: Error messages. 
                
- Milestone 3
    - [x] (12/06/2021) User will be able to transfer between their accounts
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/transaction.php?type=transfer 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/76
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/145484032-72313856-ea53-42ba-a99c-c48ee8451835.png)
                - Screenshot #1 Description: User can transfer between accounts with a memo and a positive numeric value. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/145484168-5d401847-ea05-453d-bbec-f3d99140346d.png)
                - Screenshot #2 Description: Friendly error messages and a dropdown for accounts. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/145484260-c2188338-b1dc-4cbc-af56-21efbce2b3be.png)
                - Screenshot #3 Description: User cannot transfer more than what they have. 
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/145484322-91876022-a90b-4a38-9496-606dfaf5393c.png)
                - Screenshot #4 Description: Success messages. 
              - Screenshot #5: ![image](https://user-images.githubusercontent.com/90223403/145484399-76539312-114f-4ca7-95b7-350509d7a857.png)
                - Screenshot #5 Description: Transfers included in transaction table. 
              - Screenshot #6: ![image](https://user-images.githubusercontent.com/90223403/145484514-76ad9f72-fb3e-452e-97cb-eae9e406f75f.png)
                - Screenshot #6 Description: Included in Transaction History page. 
                

    - [x] (12/08/2021) Transaction History page
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/view_transactions.php?id=1 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/77
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/145485048-4a4c3377-f51a-4b46-bf98-c47be2f326b1.png)
                - Screenshot #1 Description: Transaction History buttons on accounts page. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/145485099-973c57ac-21c8-41b0-8b1b-e7195a1cfb79.png)
                - Screenshot #2 Description: Ten transactions per page with pagination on the bottom clicker. All transaction information included on page. 
                
    - [x] (12/08/2021) User’s profile page should record/show First and Last name
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/profile.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/78
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/145485765-87324354-f537-4ff1-99f7-b5d4ab3eaca7.png)
                - Screenshot #1 Description: First and Last name included on profile page. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/145485854-95459f07-d5be-446f-a206-e588feb7d153.png)
                - Screenshot #2 Description: User can register with first and last name too. 

    - [x] (12/09/2021) User will be able to transfer funds to another user’s account
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/transaction_out.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/79
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/145486143-b636af4a-aeb3-4b3f-a154-8040ad4d8a31.png)
                - Screenshot #1 Description: User can transfer to another user's account and include a memo. The form includes last name and last four digits of destination account as well as inputting a positive numeric value.
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/145486360-5fdd9ffc-e1a2-49b7-ba73-11fb2981e765.png)
                - Screenshot #2 Description: Dropdown of accounts included. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/145486430-a6e47d7c-60d7-4d57-83d9-dbf853cd661c.png)
                - Screenshot #3 Description: Friendly error messages. 
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/145486526-f903d9ae-f92c-4627-9ef3-0b987775bf08.png)
                - Screenshot #4 Description: All error and success messages as well as "ext-transfer" included. 

- Milestone 4
    - [x] (12/14/2021) User can set their profile to be public or private (will need another column in Users table)
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/profile.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/85
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/146845151-33f67fd0-10d2-4656-89ff-e5d8b97e7571.png)
                - Screenshot #1 Description: User can make profile public or private on profile page. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/146845227-e9b93787-73eb-44b7-9f92-6b16db582a22.png)
                - Screenshot #2 Description: Public or private on USERS table. 


    - [x] (12/14/2021) User will be able open a savings account
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/create_account.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/86
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/146845406-b6ce730b-d565-4802-9319-e95c4a084467.png)
                - Screenshot #1 Description: User can create a savings account. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/146845471-a3f41482-c460-4b6c-8743-1533e0af3081.png)
                - Screenshot #2 Description: Redirects to accounts page. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/146845512-3bf988b9-7ea9-44e8-afc8-38110536122e.png)
                - Screenshot #3 Description: Included on accounts page with APY at the bottom. 
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/146845638-4d3bdc5a-9d2a-4876-b6a5-1eb8bc117894.png)
                - Screenshot #4 Description: Friendly error messages. 


    - [x] (12/20/2021) User will be able to take out a loan
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/create_loan.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/87
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/146862175-17f2c4f8-65b5-45fc-a5b2-7149d0b46e93.png)
                - Screenshot #1 Description: User can take out a loan with a minimum amount of $500 and a minimum APY of 2%. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/146862406-e701cf60-6dc3-4496-a248-95d7d9663393.png)
                - Screenshot #2 Description: Dropdown of accounts. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/146862491-56b1f438-5e81-414f-82f3-dcd8a5b71dab.png)
                - Screenshot #3 Description: Redirects to account page. 
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/146862570-987fa852-8d13-4634-b64d-8abac8dab7fe.png)
                - Screenshot #4 Description: Shows up as a loan. 
              - Screenshot #5: ![image](https://user-images.githubusercontent.com/90223403/146862646-62abd0b7-2e4f-4524-8e1c-8dc6f0ad2eb2.png)
                - Screenshot #5 Description: Transaction history of loan account. 
              - Screenshot #6: ![image](https://user-images.githubusercontent.com/90223403/146862774-95a0f06a-bfd7-439b-a10e-09bcef1f10e9.png)
                - Screenshot #6 Description: Error message. 

    - [x] (12/14/2021) Listing accounts and/or viewing Account Details should show any applicable APY or “-” if none is set for the particular account (may alternatively just hide the display for these types)
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/accounts.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/86
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/146863252-4f06744b-d92c-4d62-9cea-5df9da6f59bb.png)
                - Screenshot #1 Description: APY included on accounts page. 

    - [x] (12/20/2021) User will be able to close an account
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/close_account.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/88
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/146863390-f18a4eb7-725a-4d4e-b6c5-737be3ea282b.png)
                - Screenshot #1 Description: User can close account. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/146863441-7d38c1cc-709a-4d71-98eb-9aefba59c8c4.png)
                - Screenshot #2 Description: Error messages. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/146863550-c5490b5e-ef04-47df-854c-fe52901361f3.png)
                - Screenshot #3 Description: Success messages. 
              - Screenshot #4: ![image](https://user-images.githubusercontent.com/90223403/146863710-1dadea10-df8f-4c5e-a447-0b7ba35218d4.png)
                - Screenshot #4 Description: Account is not active anymore. 

    - [x] (11/26/2021) Admin role (leave this section for last)
        -  List of Evidence of Feature Completion
            - Status: Completed
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/test_create_accounts.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/55
            - Screenshots
              - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/146864108-671a5d95-8cc8-4b38-8253-536bd87f09cd.png)
                - Screenshot #1 Description: Admin finding user by first name. 
              - Screenshot #2: ![image](https://user-images.githubusercontent.com/90223403/146864263-c1b97648-6fe7-41eb-a2ec-538249ecd7bd.png)
                - Screenshot #2 Description: Looking up transaction history of an account. 
              - Screenshot #3: ![image](https://user-images.githubusercontent.com/90223403/146864332-862fc124-b1e9-4c70-9958-38d0f53aa0e5.png)
                - Screenshot #3 Description: Can create account. 
 
    
### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone branch as the source)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board