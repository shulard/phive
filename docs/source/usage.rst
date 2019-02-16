Usage
=====

Installing a PHAR
-----------------

Install latest version of PHPUnit:

.. code-block:: bash

    phive install phpunit

Install PHPDox, copy PHAR into the project instead of symlinking it:

.. code-block:: bash

    phive install --copy phpdox

Install PHPDox, using a filename for the symlink

.. code-block:: bash

    phive install phpdox bin/phpdox

Install a PHAR directly from an URL

.. code-block:: bash

    phive install https://phar.phpunit.de/phpunit-4.8.6.phar

Install PHPUnit, do not add entry to ``phive.xml``

.. code-block:: bash

    phive install --temporary phpunit@~5.0


Updating a PHAR
---------------

Update all tools listed in ``phive.xml`` to the newest versions
matching their version constraints

.. code-block:: bash

    phive update

Update all tools listed in ``phive.xml`` to the newest versions
matching their version constraints, only using locally stored
PHARs if possible

.. code-block:: bash

    phive update --prefer-offline

Update only PHPUnit to the newest version matching its version constraints

.. code-block:: bash

    phive update phpunit

Removing a PHAR
---------------

Remove PHPUnit from the project

.. code-block:: bash

    phive remove phpunit
