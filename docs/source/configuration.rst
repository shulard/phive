Configuration
=============

phive.xml
---------

The Phive XML configuration file holds the list of installed PHARs
as well as project-specific configuration.

<configuration>
~~~~~~~~~~~~~~~

<phar>
~~~~~~

+----------+------------------------------------------+
|Attribute | Function                                 |
+==========+==========================================+
|name      | alias of the PHAR, e.g. ``phpunit``      |
+----------+------------------------------------------+
|version   | version constraint, e.g. ``^5.0``        |
+----------+------------------------------------------+
|installed | [optional] locked version to be          |
|          | installed when running ``phive install`` |
+----------+------------------------------------------+
|location  | the filename of the symlink or copied    |
|          | PHAR                                     |
+----------+------------------------------------------+
|copy      | indicates whether the PHAR is to be      |
|          | symlinked or copied into the project.    |
|          | Possible values: ``true``, ``false``     |
+----------+------------------------------------------+
|url       | [optional] the source URL of the PHAR.   |
|          | Only used when PHAR was installed        |
|          | directly from a URL                      |
+----------+------------------------------------------+
