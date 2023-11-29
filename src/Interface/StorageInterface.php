<?php
    namespace BiTreeSearch\Interface;

    use BiTreeSearch\BinaryTree;

    interface StorageInterface {
        public function openTo (BinaryTree &$tree);
        public function saveFrom (BinaryTree &$tree);
    }