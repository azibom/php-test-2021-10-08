# php-test-2021-10-08
### How start the project
1.Install docker and docker-compose <br>
2.Run these commands
```
# go to the root of the project where docker-compose.yml exist
docker-compose up -d
make init
```
3.Done :sunglasses::fire::fire: <br>
Now you can use apis from this links <br> http://localhost:81/api/add-money and http://localhost:81/api/get-balance/1

### Run behavioral tests :fire:
I wrote some behavioral tests for the app, somethings like this ...
```
Scenario: Add money to ali's wallet serveral times and check and money amout 
  Given Get current wallet amout of user 1
  When Add 0 dollars to the user wallet with userId 1
  Then user with userId 1 should have 0 dollars more to the wallet

Scenario: Add money to ali's wallet serveral times and check and money amout 
  Given Get current wallet amout of user 1
  When Add 1 dollars to the user wallet with userId 1
  Then user with userId 1 should have 1 dollars more to the wallet

Scenario: Add money to ali's wallet serveral times and check and money amout 
  Given Get current wallet amout of user 1
  When Add 1 dollars to the user wallet with userId 1
  When Add -1 dollars to the user wallet with userId 1
  Then user with userId 1 should have 0 dollars more to the wallet

Scenario: Add money to ali's wallet serveral times and check and money amout 
  Given Get current wallet amout of user 1
  When Add 1 dollars to the user wallet with userId 1
  When Add -1 dollars to the user wallet with userId 1
  When Add 100 dollars to the user wallet with userId 1
  When Add 200 dollars to the user wallet with userId 1
  When Add -50 dollars to the user wallet with userId 1
  Then user with userId 1 should have 250 dollars more to the wallet

Scenario: Add money to ali's wallet and moahmmad's wallet serveral times and check and money amout 
  Given Get current wallet amout of user 1
  Given Get current wallet amout of user 2
  When Add 1 dollars to the user wallet with userId 1
  When Add -1 dollars to the user wallet with userId 1
  When Add 5 dollars to the user wallet with userId 2
  Then user with userId 1 should have 0 dollars more to the wallet
  Then user with userId 2 should have 5 dollars more to the wallet

Scenario: Add money to ali's wallet and moahmmad's wallet serveral times and check and money amout 
  Given Get current wallet amout of user 1
  Given Get current wallet amout of user 2
  When Add 1000 dollars to the user wallet with userId 1
  When Add -2000 dollars to the user wallet with userId 1
  When Add 100 dollars to the user wallet with userId 1
  When Add 5 dollars to the user wallet with userId 2
  When Add 55 dollars to the user wallet with userId 2
  Then user with userId 1 should have -900 dollars more to the wallet
  Then user with userId 2 should have 60 dollars more to the wallet
```
You can run this command for test the app with different scenarios
```
make test
```
And that will be the result
```
6 scenarios (6 passed)
33 steps (33 passed)
0m2.91s (11.53Mb)
```
### Run the command for calc the total transaction amount (daily job)
You can run the command like this
```
make totalTransactionCalc
```
Result
```
Total amount of transactions is -668
```
And if you want to run it once every day you can just run this command
```
sudo crontab -e
```
And then add this line at the end of the file and that is all
```
0 0 * * * cd <make file path> ; make totalTransactionCalc
```
### How send a request
#### add-money
You can send data to http://localhost:81/api/add-money with `post` method <br>
Your request body should have `amout (int)` and `user_id (int)` fields <br> (send them in `form-data`)

#### get-balance
You can fetch http://localhost:81/api/get-balance/1 with `get` method <br>
Your request should have `user_id` which is a url param and in this example we set it to 1 <br>

For testing the app manually you can use the add-money api to add the money to the use wallet and then with get balance api check the wallet <br>

