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
    - [x] (10/12/2021) User will be able to register a new account
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/register.php
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/14
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
                

    - [x] (10/12/2021) User will be able to login to their account (given they enter the correct credentials)
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
                
    - [x] (10/12/2021) User will be able to logout
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: https://nyr2-prod.herokuapp.com/Project/login.php 
            - Pull Requests
            - PR link #1: https://github.com/NamanRaval/IT202-009/pull/14
            - Screenshots
                - Screenshot #1: ![image](https://user-images.githubusercontent.com/90223403/141229690-3e217960-4bff-4dfc-9734-9e25acbf5fe2.png)
                  - Screenshot #1: Session should be destroyed (so the back button doesn’t allow them access back in) implemented. 
                - Screenshot #2: 
                  - Screenshot #2: 
                - Screenshot #3: 
                  - Screenshot #3:
                - Screenshot #4:
                  - Screenshot #4: 
                - Screenshot #5: 
                  - Screenshot #5: 

    - [x] (10/12/2021) Basic security rules implemented
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

    - [x] (10/12/2021) Basic Roles implemented
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


    - [x] (10/12/2021) Site should have basic styles/theme applied; everything should be styled
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
            - Pull Requests
            - PR link #1 (repeat as necessary)
            - Screenshots
            - Screenshot #1: https://i.gyazo.com/a0b82204cff3bc08331e4abb84116d5d.png 
            - Screenshot #2: https://i.gyazo.com/08378a645c06fab46d230e28dcbe3d87.png
                - Screenshot #1 and #2 Description: These screenshots shows all of the styles that have been implemented on this site. The text is a different color, the background is a different color, the text boxes have a rounded shape to them, the links change color when the mouse hovers over them (couldn't show this in a screenshot), the color outside of the links are changed, and the error messages are also different colors. 

    - [x] (10/12/2021) Any output messages/errors should be “user friendly”
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
            - Pull Requests
            - PR link #1 (repeat as necessary)
            - Screenshots
            - Screenshot #1: https://i.gyazo.com/08378a645c06fab46d230e28dcbe3d87.png 
            - Screenshot #2: https://i.gyazo.com/82e96d5919d845ee440014dbd07969e4.png 
                - Screenshot #1 and #2 Description: These screenshots show the different error messages that pop up when the user makes a mistake. 

    - [x] (10/12/2021) User will be able to see their profile
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
            - Pull Requests
            - PR link #1 (repeat as necessary)
            - Screenshots
            - Screenshot #1: https://i.gyazo.com/6fea29a5d1addf372ad6a7202c7da6a3.png 
                - Screenshot #1 Description: This screenshot shows that the user is able to see their profile. 

    - [x] (10/12/2021) User will be able to edit their profile
        -  List of Evidence of Feature Completion
            - Status: Completed 
            - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
            - Pull Requests
            - PR link #1 (repeat as necessary)
            - Screenshots
            - Screenshot #1: https://i.gyazo.com/4434b93ce3aa330a5afaf4f7ac91433f.png 
                - Screenshot #1 Description: This screenshot shows that the user is able to edit their profile. 

    
- Milestone 2
- Milestone 3
- Milestone 4
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