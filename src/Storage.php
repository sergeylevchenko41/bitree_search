<?php
    namespace BiTreeSearch;

    use BiTreeSearch\BinaryTree;
    use BiTreeSearch\Interface\StorageInterface;

    class Storage implements StorageInterface {
        private const FILE_NAME = "storage/bitree.csv";

        public function saveFrom (BinaryTree &$tree) {
            $handle = fopen(self::FILE_NAME, "w+");

            $data = [];
            $this->serialize($tree->root, $data);

            fputcsv($handle, $data, ',');

            fclose($handle);
        }

        public function openTo (BinaryTree &$tree) {
            $handle = fopen(self::FILE_NAME, "r");

            while (($values = fgetcsv($handle, 1000, ",")) !== false) {
                $this->deSerialize($tree->root, $values);
                break;
            }

            fclose($handle);
        }

        public function serialize ($node, array &$data) {
            if ($node === null) {
                $data[] = '#';
                return;
            }

            $data[] = $node->value;

            $this->serialize($node->left, $data);
            $this->serialize($node->right, $data);
        }

        public function deSerialize (&$node, array &$data) {
            $value = array_shift($data);

            if ($value === '#') {
                return null;
            }

            $node = new BinaryNode($value);

            $this->deSerialize($node->left, $data);
            $this->deSerialize($node->right, $data);
        }
    }