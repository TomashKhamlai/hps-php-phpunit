<?php
require_once(__DIR__.'/Actionwords.php');

class ServeCoffeeTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();
  }

  public function testSimpleUse() {
    // Well, sometimes, you just get a coffee.
    // Tags: priority:high
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When I take a coffee
    $this->actionwords->iTakeACoffee();
    // Then coffee should be served
    $this->actionwords->coffeeShouldBeServed();
  }
}
?>