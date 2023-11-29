<?php
    namespace BiTreeSearch;

    class BinaryTree
    {
        public ?BinaryNode $root;

        public function __construct() {
            $this->root = null;
        }

        public function isEmpty() {
            return $this->root === null;
        }

        public function fillWithArray (array &$array) {
            foreach ($array as $item) {
                $this->insert($item);
            }
        }

        private function insert($item) {
            $node = new BinaryNode($item);

            if ($this->isEmpty()) {
                $this->root = $node;
            }
            else {
                $this->insertNode($node, $this->root);
            }
        }
      
        protected function insertNode(BinaryNode $node, ?BinaryNode &$subtree) {
            if ($subtree === null) {
                $subtree = $node;
            }
            else {
                if ($node->value > $subtree->value) {
                    $this->insertNode($node, $subtree->right);
                }
                
                if ($node->value < $subtree->value) {
                    $this->insertNode($node, $subtree->left);
                }
            }
        }
    }