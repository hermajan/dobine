#! /bin/bash
# Script runs tests

# Default shell script for running tests from `tests` folder
echo -e "Nette Tester"
#    vendor/bin/tester -C -s tests tests

# PHP version of script for running tests
php "vendor/nette/tester/src/tester.php" -C -s tests tests
