<?php
    use BiTreeSearch\BinaryTree;
    use BiTreeSearch\Storage;
    use BiTreeSearch\Search;
    use BiTreeSearch\Input;

    require_once __DIR__ . '/autoload.php';

    // input json to array
    $input = new Input();
    $array = $input->getArrayValuesByKey('year');

    // fill input data to tree
    $bitree = new BinaryTree();
    $bitree->fillWithArray($array);

    // save to csv
    $storage = new Storage();
    $storage->saveFrom($bitree);

    // get from csv
    $bitree2 = new BinaryTree();
    $storage->openTo($bitree2);

    // search by year
    $search = new Search('1919-01-01T00:00:00.000', $array, $bitree);
    $search->run();

    // search by name
    $input = new Input();
    $array = $input->getArrayValuesByKey('name');

    $bitree = new BinaryTree();
    $bitree->fillWithArray($array);

    $search = new Search('bAbee', $array, $bitree);
    $search->run();

    // search by name
    $input = new Input();
    $array = $input->getArrayValuesByKey('mass');
    
    $bitree = new BinaryTree();
    $bitree->fillWithArray($array);

    $search = new Search(4239, $array, $bitree);
    $search->run();