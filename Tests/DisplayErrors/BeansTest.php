<?php
require_once(__DIR__.'/../Actionwords.php');

class BeansTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();

    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // And I handle everything except the beans
    $this->actionwords->iHandleEverythingExceptTheBeans();
  }

  public function testMessageFillBeansIsDisplayedAfter38CoffeesAreTaken() {
    // Tags: priority:high
    // When I take "38" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(38);
    // Then message "Fill beans" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Fill beans");
  }

  public function testItIsPossibleToTake40CoffeesBeforeThereIsReallyNoMoreBeans() {
    // Tags: priority:low
    // When I take "40" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(40);
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should not be served
    $this->actionwords->coffeeShouldNotBeServed();
    // And message "Fill beans" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Fill beans");
  }

  public function testAfterAddingBeansTheMessageFillBeansDisappears() {
    // Tags: priority:high
    // When I take "40" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(40);
    // And I fill the beans tank
    $this->actionwords->iFillTheBeansTank();
    // Then message "Ready" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Ready");
  }
}
?>