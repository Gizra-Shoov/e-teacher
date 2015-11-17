Feature: Login
  In order to be able to login to the student personal area
  As an anonymous user
  We need to be able to have access to the student personal area

  @javascript
  Scenario: Visit the login area page
    Given I am on login page
    When  I fill in "EmailOrUsername" with "boaz@eteachergroup.com"
    And   I fill in "Password" with "Zaq12wsx"
    And   I press "Go!"
    Then  I should see "choose an account"

