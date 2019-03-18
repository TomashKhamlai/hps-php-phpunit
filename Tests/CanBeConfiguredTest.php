<?php
require_once(__DIR__.'/Actionwords.php');

class CanBeConfiguredTest extends PHPUnit_Framework_TestCase {
  public $actionwords;
  public function setUp() {
    $this->actionwords = new Actionwords();
  }

  public function testDisplaySettings() {
    // Tags: priority:medium
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When I switch to settings mode
    $this->actionwords->iSwitchToSettingsMode();
    // Then displayed message is:
    $this->actionwords->displayedMessageIs("Settings:\n - 1: water hardness\n - 2: grinder");
  }

  public function testDefaultSettings() {
    // Tags: priority:high
    // Given the coffee machine is started
    $this->actionwords->theCoffeeMachineIsStarted();
    // When I switch to settings mode
    $this->actionwords->iSwitchToSettingsMode();
    // Then settings should be:
    $this->actionwords->settingsShouldBe("| water hardness | 2      |\n| grinder        | medium |");
  }
}
?>