<?php
    namespace BiTreeSearch;

    use BiTreeSearch\BinaryTree;
    use BiTreeSearch\BinaryNode;

    class Search {
        private $value;

        private $array;
        private BinaryTree $tree;

        private int $iterations;

        public function __construct ($value, $array, BinaryTree &$tree) {
            $this->value = $value;
            $this->array = $array;
            $this->tree = $tree;
        }

        public function run () {
            $this->printResult($this->isInTree(), 'in tree');

            $this->printResult($this->isInArray(), 'in array');
        }

        private function isInTree (): bool {
            $this->iterations = 0;

            return $this->isInNode($this->tree->root);
        }

        private function isInNode (?BinaryNode $node): bool {
            if ($node === null) {
                return false;
            }
            
            $this->iterations++;

            if ($node->value == $this->value) {
                return true;
            }

            if ($this->value > $node->value) {
                return $this->isInNode($node->right);
            }

            if ($this->value < $node->value) {
                return $this->isInNode($node->left);
            }
        }

        private function isInArray (): bool {
            $this->iterations = 0;

            foreach ($this->array as $arrayItem) {
                $this->iterations++;
                
                if ($arrayItem == $this->value) {
                    return true;
                }
            }

            return false;
        }

        private function printResult (bool $success, $searchedIn) {
            if ($success) {
                print 'Found value "' . $this->value . '" ' . $searchedIn . ' for ' . $this->iterations . ' iterations' . PHP_EOL;
            } else {
                print 'Not found value "' . $this->value . '" ' . $searchedIn . PHP_EOL;
            }
            
        }
    }