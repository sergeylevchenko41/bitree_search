<?php
    namespace BiTreeSearch;

    class BinaryNode
    {
        public $value;
        public ?BinaryNode $left;
        public ?BinaryNode $right;

        public function __construct($item) {
            $this->value = $item;

            $this->left = null;
            $this->right = null;
        }
    }