<?php
require_once(__DIR__.'/../Actionwords.php');

class WaterTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();

    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // And I handle everything except the water tank
    $this->actionwords->iHandleEverythingExceptTheWaterTank();
  }

  public function testMessageFillWaterTankIsDisplayedAfter50CoffeesAreTaken() {
    // Tags: priority:high
    // When I take "50" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(50);
    // Then message "Fill tank" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Fill tank");
  }

  public function testItIsPossibleToTake10CoffeesAfterTheMessageFillWaterTankIsDisplayed() {
    // Tags: priority:low
    // When I take "60" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(60);
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should not be served
    $this->actionwords->coffeeShouldNotBeServed();
  }

  public function testWhenTheWaterTankIsFilledTheMessageDisappears() {
    // Tags: priority:high
    // When I take "55" coffees
    $this->actionwords->iTakeCoffeeNumberCoffees(55);
    // And I fill the water tank
    $this->actionwords->iFillTheWaterTank();
    // Then message "Ready" should be displayed
    $this->actionwords->messageMessageShouldBeDisplayed("Ready");
  }
}
?>