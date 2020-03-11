# candid-back
There is no style for the front for the moment ! I will add it later.

Since we talked about elasticsearch during our interview I decided to use it to do the assignement Since we talked about elasticsearch during our interview I decided to use it to do the assignment.
When you do a research, you can make a writing mistake and still find the result. That's why if you search for "Bill" you will have "Bill & Melinda Gates Foundation" as the first result but also "The William and Flora Hewlett Foundation" for the second result.

When you click on a result, it automatically changes it inside the input and reruns the suggester. 

When you click on search a list of all of the result will be displayed, if you click on one of the results you will be redirected to the website.

TODO : 
- Add style (I will propably use Material-UI for that) 

- Add total amount founded.

In the backend you have three files: 'index' 'mapping' and 'suggest'

Index and mapping are used for elasticsearch. Index call the candid API (the api link and the api key are both registered as environment variable for obvious security reasons) to save all of the data in elasticsearch. Suggest is where the search function is.  
I repeat that there is no style at all for the moment. I wanted to have something that works before working on the UX.
