<?php
class Content {
  protected $name;
  protected $image;
  protected $introduction;
  protected $explain;
  protected $alphabet_name;
  protected static $count = 0;

  public function __construct($name, $image, $introduction, $explain, $alphabet_name) {
    $this->name = $name;
    $this->image = $image;
    $this->introduction = $introduction;
    $this->explain = $explain;
    $this->alphabet_name = $alphabet_name;
    self::$count++;
  }

  public function getName() {
    return $this->name;
  }

  public function getImage() {
    return $this->image;
  }

  public function getIntroduction() {
    return $this->introduction;
  }

  public function getExplain() {
    return $this->explain;
  }

  public function getAlphabet_name() {
    return $this->alphabet_name;
  }

  public static function getCount() {
    return self::$count;
  }

  public static function findByName($contents, $name) {
    foreach($contents as $content) {
      if($content->getName() === $name) {
        return $content;
      }
    }
  }

}


