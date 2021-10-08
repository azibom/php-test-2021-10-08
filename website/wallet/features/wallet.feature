Feature: User Wallet
  In work with wallet
  As a user
  I need to be able to add money to the wallet and get data from it

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