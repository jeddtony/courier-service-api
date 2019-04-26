<h1> Courier Service Api </h1>
<h4> How the Api was structured </h4>
<p> The courier service api was written with 4 personas in mind. They are <ol> <li> Sender: The person sending the parcel. </li> <li> Recipient: The person receiving the parcel </li> <li> Dispatcher: The dispatch agent charged with delivering the parcel </li> <li> User: The person at the office desk </li> </ol> </p>
<h4>Background Info </h4>
<p>If a sender wants to send a parcel to a recipient, the user (person at the office desk) will fill in the sender's details (name, email and phone number), then fill in the recipient details (name, email, phone number and address). The delivery is generated, and a cost is calculated. The cost for the distance is calculated by multiplying the total distance (measured in kilometres) by 100 (N100). The cost for the weight of the parcel is calculated by multiplying the weight (in kilograms) by 200 (N200). The total cost is gotten by summing up the cost for the distance with the cost for the weight. For example, if a sender wants to send a parcel of 2kg to a recipient 5km away. The cost for the distance will be 5 X 100 = N500 and the cost for weight will be 2 X 200 = N400, hence, his total cost is 500 + 400 = N900. The distance can be gotten from google map api. </p>
<p> 
For every delivery a token is generated, this token to given to the sender which the recipient is required to have at the point of collection. Then as added security, every token is accompanied with a question and an answer created by the sender, which the recipient is required to provide the answer at the point of collection. 

<h4> Making Requests </h4>
Note that all request must be prefixed by <code> /api </code>  after the url
<h5> Get </h5>
To get all senders use this end point <br>
<code>/api/senders </code>
To get a particular sender use <br>
<code> /api/senders/{sender} </code> where <code> {sender} </code> is the id of the sender, it should be an integer value.
To get all recipients use <br>
<code> /api/recipients </code>
To get a particular recipient use <br>
<code> /api/recipients/{recipients} </code> <br>
To get all deliveries <br>
<code> /api/deliveries </code>
To get a particular delivery use <br>
<code> /api/deliveries/{delivery} </code>
To get a particular token <br>
<code> /api/tokens/{token} </code>
