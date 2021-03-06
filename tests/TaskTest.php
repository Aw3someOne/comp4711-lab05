<?php

  if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
  }

 class TaskTest extends PHPUnit_Framework_TestCase {
    private $CI;
    private $task;

    public function setUp() {

      // Load CI instance normally
      $this->CI = &get_instance();

      // make a dummy task
      // new task
      $this -> task = new Task;
      $this -> task -> task = "abc";
    }

   /*
    * Task Name Testing
    */
    public function testSetName () {
        $this -> task -> task = "#1";
        $this->assertNotEquals("#1", $this -> task -> task);
    }

    public function testSetNameLength64() {
        $this -> task -> task = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this -> assertEquals("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", $this -> task -> task);
    }
 
    public function testSetNameLengthOver64() {
        $this -> task -> task = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $this -> assertNotEquals("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", $this -> task -> task);
    }

    public function testSetNameLength1() {
        $this -> task -> task = "a";
        $this -> assertEquals("a", $this -> task -> task);
    }
    
    public function testSetNameLengthEmpty() {
        $this -> task -> task = "";
        $this -> assertNotEquals("", $this -> task -> task);
    }
    
    public function testSetNameLengthNull() {
        $this -> task -> task = null;
        $this -> assertNotEquals(null, $this -> task -> task);
    }

    public function testSetNameString() {
        $this -> task -> task = "Name";
        $this->assertEquals("Name", $this -> task -> task);
    }
   
    public function testSetNameInt() {
        $this -> task -> task = 2;
        $this->assertNotEquals(2, $this -> task -> task);
    }
   
    public function testSetNameDouble() {
        $this -> task -> task = 2.0;
        $this->assertNotEquals(2.0, $this -> task -> task);
    }

    public function testSetNameIntString() {
        $this -> task -> task = "2";
        $this->assertEquals("2", $this -> task -> task);
    }
   
    public function testSetNameDoubleString() {
        $this -> task -> task = "2.0";
        $this->assertNotEquals("2.0", $this -> task -> task);
    }

    public function testSetNameCaps () {
        $this -> task -> task = "ABC";
        $this->assertEquals("ABC", $this -> task -> task);
    }
   
    public function testSetNameBoolean() {
        $this -> task -> task = true;
        $this->assertNotEquals(true, $this -> task -> task);
    }
    
    public function testSetNameGood () {
        $this -> task -> task = "abc";
        $this->assertEquals("abc", $this -> task -> task);
    }
   
   /*
    * Priority Testing
    */
    public function testSetPriority () {
        $this -> task -> priority = "aaa";
        $this->assertNotEquals("aaa", $this -> task -> priority);
    }

    //Test double for priority, should only accept ints
    public function testSetPriorityDouble () {
        $this -> task -> priority = 2.0;
        $this->assertNotEquals(2.0, $this -> task -> priority);
    }

    public function testSetPriorityString () {
        $this -> task -> priority = "1";
        $this->assertNotEquals("1", $this -> task -> priority);
    }

    public function testSetPriorityEmpty () {
        $this -> task -> priority = 2;
        $this -> task -> priority = "";
        $this->assertEquals(2, $this -> task -> priority);
    }

    public function testSetPriorityNull () {
        $this -> task -> priority = 2;
        $this -> task -> priority = null;
        $this->assertEquals(2, $this -> task -> priority);
    }

    public function testSetPriorityContainsInt () {
        $this -> task -> priority = 2;
        $this -> task -> priority = "a2";
        $this->assertEquals(2, $this -> task -> priority);
    }

    public function testSetPrioritySum () {
        $this -> task -> priority = 6 / 2;
        $this->assertEquals(3, $this -> task -> priority);
    }

    public function testSetPrioritySumDouble () {
        $this -> task -> priority = 7 / 2;
        $this->assertNotEquals(3, $this -> task -> priority);
    }
    
    public function testSetPriorityBoolean () {
        $this -> task -> priority = true;
        $this->assertNotEquals(true, $this -> task -> priority);
    }
    
    public function testSetPriorityGood () {
        $this -> task -> priority = 3;
        $this->assertEquals(3, $this -> task -> priority);
    }

    /*
     * Size Testing
     */
    public function testSetSizeString () {
        $this -> task -> size = "4";
        $this->assertNotEquals("4", $this -> task -> size);
    }

    public function testSetSizeLower () {
        $this -> task -> size = 1;
        $this->assertEquals(1, $this -> task -> size);
    }

    public function testSetSizeHigher () {
        $this -> task -> size = 3;
        $this->assertEquals(3, $this -> task -> size);
    }

    public function testSetSizeLowerLimit () {
        $this -> task -> size = 0;
        $this->assertEquals(null, $this -> task -> size);
    }

    public function testSetSizeHigherLimit () {
        $this -> task -> size = 4;
        $this->assertNotEquals(4, $this -> task -> size);
    }

    public function testSetSizeDouble () {
        $this -> task -> size = 2.0;
        $this->assertNotEquals(2.0, $this -> task -> size);
    }

    public function testSetSizeBoolean () {
        $this -> task -> size = true;
        $this->assertNotEquals(true, $this -> task -> size);
    }

    public function testSetSizeGood () {
        $this -> task -> size = 2;
        $this->assertEquals(2, $this -> task -> size);
    }

    /*
     * Group Testing
     */
    public function testSetGroupString () {
        $this -> task -> group = "5";
        $this->assertNotEquals("5", $this -> task -> group);
    }
 
    public function testSetGroupLower () {
        $this -> task -> group = 1;
        $this->assertEquals(1, $this -> task -> group);
    }

    public function testSetGroupHigher () {
        $this -> task -> group = 5;
        $this->assertNotEquals(5, $this -> task -> group);
    }
    
    public function testSetGroupHigherLimit () {
        $this -> task -> group = 4;
        $this->assertEquals(4, $this -> task -> group);
    }

    public function testSetGroupLowerLimit () {
        $this -> task -> group = 0;
        $this->assertEquals(null, $this -> task -> group);
    }

    public function testSetGroupDouble () {
        $this -> task -> group = 2.0;
        $this->assertNotEquals(2.0, $this -> task -> group);
    }

    public function testSetGroupBoolean () {
        $this -> task -> group = true;
        $this->assertNotEquals(true, $this -> task -> group);
    }

    public function testSetGroupGood () {
        $this -> task -> group = 2;
        $this->assertEquals(2, $this -> task -> group);
    }
}
?>
