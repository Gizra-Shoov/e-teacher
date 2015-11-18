<?php

use Drupal\DrupalExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

class FeatureContext extends MinkContext implements SnippetAcceptingContext {

  /**
   * @Given I am an anonymous user
   */
  public function iAmAnAnonymousUser() {
    // Just let this pass-through.
  }

  /**
   * @When I visit the homepage
   */
  public function iVisitTheHomepage() {
    $this->getSession()->visit($this->locatePath('/'));
  }

  /**
   * @Then I should have access to the page
   */
  public function iShouldHaveAccessToThePage() {
    $this->assertSession()->statusCodeEquals('200');
  }

  /**
   * @Then I should not have access to the page
   */
  public function iShouldNotHaveAccessToThePage() {
    $this->assertSession()->statusCodeEquals('403');
  }

  /**
   * Login a user to the site.
   *
   * @param $name
   *   The user name.
   */
  private function _login($name) {
    if ($name == "boaz") {
      $this->user = "boaz@eteachergroup.com";
      $this->password = "Zaq12wsx";
    }
  }

  /**
   * @Given I login with user :arg1
   */
  public function iLoginWithUser2($name)
  {
    $this->_login($name);
  }


  /**
   * @When I visit the student personal area page
   */
  public function iVisitTheStudentPersonalAreaPage2() {
    $this->getSession()->visit('https://student.eteachergroup.com/Login?ReturnUrl=%2f');

    $element = $this->getSession()->getPage();
    $element->fillField('EmailOrUsername', $this->user);
    sleep(3);
    $element->fillField('Password', $this->password);
    sleep(3);
    $submit = $element->find('css',"#goButton input");

    if (empty($submit)) {
      throw new \Exception(sprintf("No submit button at %s", $this->getSession()->getCurrentUrl()));
    }

    $this->clear();
    // Log in.
    $submit->click();
  }

  public function clear() {
    $this->user = "";
    $this->password = "";
  }
}
