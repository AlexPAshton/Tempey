<?php
    class CoreFeatureModel
    {
        public $title;
        public $subtitle;
        public $description;

        public function __construct($title, $subtitle, $description)
        {
            $this->title = $title;
            $this->subtitle = $subtitle;
            $this->description = $description;
        }
    }
?>