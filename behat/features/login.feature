Feature: Login
  In order to be able to login to the student personal area
  As an anonymous user
  We need to be able to have access to the student personal area

  @javascript
  Scenario: Visit the login area page
    Given  I login with user "boaz"
    When   I visit the student personal area page
    Then   I should see "Binnun Boaz"
