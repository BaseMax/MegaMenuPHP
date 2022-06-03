# Mega Menu PHP

**MegaMenuPHP** is a simple menu system for PHP that allows you to recursively get menu items and its submenus.

## Using

```sh
$ php menu.php
```

### Test Data

**Menu:**

| ID | Menu ID | Parent ID|
|----|---------|----------|
| 1 | 1 | NULL |
| 2 | 2 | NULL |
| 3 | 3 | NULL |
| 4 | 4 | NULL |
| 5 | 5 | NULL |
| 6 | 6 | NULL |
| 7 | 7 | 6 |
| 8 | 8 | 6 |
| 9 | 9 | 2 |
| 10 | 9 | 3 |
| 11 | 9 | 4 |
| 12 | 10 | 9 |

**Menu Item:**

| ID | Name |
|----|------|
| 1 | Personal cabinet |
| 2 | News |
| 3 | Sitemap |
| 4 | Information |
| 5 | Contacts |
| 6 | System |
| 7 | Official site |
| 8 | Supporting forum |
| 9 | Sub Test 1 |
| 10, | Sub Test 2 |

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

### Database Structure

```sql
CREATE TABLE `menu` (
  `id` int(20) NOT NULL,
  `menu_id` int(20) NOT NULL,
  `parent_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `menu_item` (
  `id` int(20) NOT NULL,
  `name` varchar(54) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

© Copyright 2022, Max Base
