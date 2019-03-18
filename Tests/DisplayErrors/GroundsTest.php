<?php
require_once(__DIR__.'/../Actionwords.php');

class GroundsTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();

    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // And I handle everything except the grounds
    $this->actionwords->iHandleEverythingExceptTheGrounds();
  }

  public function testMessageEmptyGroundsIsDisplayedAfter30CoffeesAreTaken() {
    // Tags: priority:high
    // When I take "30" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(30);
    // Then message "Empty grounds" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Empty grounds");
  }

  public function testWhenTheGroundsAreEmptiedMessageIsRemoved() {
    // Tags: priority:medium
    // When I take "30" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(30);
    // And I empty the coffee grounds
    $this->actionwords->iEmptyTheCoffeeGrounds();
    // Then message "Ready" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Ready");
  }
}
?>