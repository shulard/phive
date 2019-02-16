Installation
============

Initial Installation
--------------------

Installation of PHIVE is easy and about the last time you have to do anything phar related manually.
Grab your copy of PHIVE from the `releases <https://github.com/phar-io/phive/releases>`_ section at
our GitHub page or follow these simple steps:

.. code-block:: bash

    wget https://phar.io/releases/phive.phar
    wget https://phar.io/releases/phive.phar.asc
    gpg --keyserver hkps.pool.sks-keyservers.net --recv-keys 0x9D8A98B29B2D5D79
    gpg --verify phive.phar.asc phive.phar
    chmod +x phive.phar
    sudo mv phive.phar /usr/bin/phive

Updating an existing Installation
---------------------------------

If you already have a running installation of Phive, simply run
``phive selfupdate`` to obtain the latest version.

Internally, updating the Phive PHAR works the same way as installing
any other PHAR.
