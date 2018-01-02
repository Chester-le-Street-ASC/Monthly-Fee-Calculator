# Chester-le-Street ASC Monthly Fee Calculator
Our Fee Calculator calculates monthly fees and applies discounts for multiple swimmers

## Why do we need this tool?
If you have multiple swimmers, we apply discounts, in order of the cost for each swimmer - Highest cost recieving lowest discounts. This tool makes it easy to calculate your monthly fee, with discounts applied.

## What happens straight out of the box?
1. The first two swimmers (ordered by fee, high to low) get no discount.
2. Swimmer 3 gets a 20% discount.
3. Swimmer 4 and up gets a 40% discount.

You can adapt this programme to your own needs by modifying some `if` statements. If you're not in the know with PHP, [get the lowdown from their docs](http://php.net/manual/en/control-structures.if.php).

## Some things you'll need to deal with
`index.php` and `result.php` include `header.php` and `footer.php` files which are not part of this repository. You'll need to create files called `header.php` and `footer.php` and add the nessecary HTML5 `<head>`, `<body` and `<footer>` stuff, including [compiled Bootstrap 4 CSS and JS](http://getbootstrap.com/docs/4.0/getting-started/introduction/), unless you'll be using your own CSS.

Feel free to use this project however you like, just remember [it's licenced under the Apache Licence](https://github.com/Chester-le-Street-ASC/Monthly-Fee-Calculator/blob/master/LICENSE).
