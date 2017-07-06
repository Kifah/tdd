Feature: Api
  In order to get the company bonus calculated
  As a web user
  I need to be able call the api and get a result

  Scenario: calculating company bonus
    Given I send a GET request to "/calculator/2"
    Then I should get Status Code 200
    And I should get the Json Content
    """
    {
    "bonus": "4"
    }
    """
