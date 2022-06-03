# Mega Menu PHP

**MegaMenuPHP** is a simple menu system for PHP that allows you to recursively get menu items and its submenus.

## Using

```sh
$ php menu.php
```

### Tree

```
Array
(
    [0] => Array (
            [id] => 1
            [name] => Personal cabinet
        )
    [1] => Array (
            [id] => 2
            [name] => News
            [children] => Array (
                    [0] => Array (
                            [id] => 9
                            [name] => Sub Test 1
                            [children] => Array
                                (
                                    [0] => Array
                                        (
                                            [id] => 10
                                            [name] => Sub Test 2
                                        )
                                )
                        )
                )
        )
    [2] => Array (
            [id] => 3
            [name] => Sitemap
            [children] => Array (
                    [0] => Array (
                            [id] => 9
                            [name] => Sub Test 1
                            [children] => Array (
                                    [0] => Array
                                        (
                                            [id] => 10
                                            [name] => Sub Test 2
                                        )
                                )
                        )
                )
        )
    [3] => Array (
            [id] => 4
            [name] => Information
            [children] => Array (
                    [0] => Array (
                            [id] => 9
                            [name] => Sub Test 1
                            [children] => Array (
                                    [0] => Array (
                                            [id] => 10
                                            [name] => Sub Test 2
                                        )
                                )
                        )
                )
        )
    [4] => Array (
            [id] => 5
            [name] => Contacts
        )
    [5] => Array (
            [id] => 6
            [name] => System
            [children] => Array (
                    [0] => Array (
                            [id] => 7
                            [name] => Official site
                        )
                    [1] => Array (
                            [id] => 8
                            [name] => Supporting forum
                        )
                )
        )
)
```

© Copyright 2022, Max Base
