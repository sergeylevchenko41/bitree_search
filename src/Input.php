<?php
    namespace BiTreeSearch;

    class Input {
        private const FILE_NAME = "data.json";

        public function getArrayValuesByKey (string $key) {
            $result = [];

            $json = file_get_contents('input/' . self::FILE_NAME); 

            $jsonArray = json_decode($json, true); 

            foreach ($jsonArray as $row) {
                if (isset($row[$key]) && !is_array($row[$key])) {
                    $result[] = $row[$key];
                }
            }

            return $result;
        }
    }