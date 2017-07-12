Symfony GraphQL PHP Edition
===========================

[![Build Status](https://travis-ci.org/MonsieurBon/symfony-graphql-php.svg?branch=master)](https://travis-ci.org/MonsieurBon/symfony-graphql-php)

Welcome to the Symfony GraphQL PHP Edition - a fully-functional Symfony2
application that you can use as the skeleton for your new applications.

This document contains information on how to download, install, and start
using Symfony. For a more detailed explanation, see the [Installation][1]
chapter of the Symfony Documentation.

1) Installing the GraphQL PHP Edition
-------------------------------------

When it comes to installing the Symfony GraphQL PHP Edition, you have the
following options.

### Use Composer (*recommended*)

As Symfony uses [Composer][2] to manage its dependencies, the recommended way
to create a new project is to use it.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `create-project` command to generate a new Symfony application:

    php composer.phar create-project ethy/symfony-graphql-php --stability=stable path/to/install

Composer will install Symfony and all its dependencies under the
`path/to/install` directory.

### Download an Archive File

To quickly test Symfony, you can also download an [archive][3] of the GraphQL PHP
Edition and unpack it somewhere under your web server root directory.

If you downloaded an archive "without vendors", you also need to install all
the necessary dependencies. Download composer (see above) and run the
following command:

    php composer.phar install

2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

Access the `config.php` script from a browser:

    http://localhost/path/to/symfony/app/web/config.php

If you get any warnings or recommendations, fix them before moving on.

3) Browsing the Demo Application
--------------------------------

Congratulations! You're now ready to use Symfony.

From the `config.php` page, click the "Bypass configuration and go to the
Welcome page" link to load up your first Symfony page.

You can also use a web-based configurator by clicking on the "Configure your
Symfony Application online" link of the `config.php` page.

To see your GraphQL Endpoint in action use [GraphiQL][4] or a browser extension
like [ChromeiQL][5] and point it to /api to browse the API. The endpoint accepts
the variable debug_api=1 to add additional information and forward php errors.

To run the tests install PHPUnit 3.7+ and call:

    phpunit

4) Getting started with Symfony
-------------------------------

This distribution is meant to be the starting point for your Symfony
applications, but it also contains some sample code that you can learn from
and play with.

A great way to start learning Symfony is via the [Quick Tour][6], which will
take you through all the basic features of Symfony2.

Once you're feeling good, you can move onto reading the official
[Symfony2 book][7].

A default bundle, `AppBundle`, shows you Symfony2 in action. After
playing with it, you can remove it by following these steps:

  * delete the `src/AppBundle` directory;

  * remove the routing entries referencing AcmeBundle in
    `app/config/routing_dev.yml`;

  * remove the AppBundle from the registered bundles in `app/AppKernel.php`;

  * remove the `security.providers`, `security.firewalls.login` and
    `security.firewalls.secured_area` entries in the `security.yml` file or
    tweak the security configuration to fit your needs.

What's inside?
---------------

The Symfony GraphQL PHP Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Translations are activated

  * Doctrine ORM/DBAL is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][8] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][9] - Adds support for the Doctrine ORM

  * [**TwigBundle**][10] - Adds support for the Twig templating engine

  * [**SwiftmailerBundle**][12] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][13] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][14] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][15] (in dev/test env) - Adds code generation
    capabilities

  * [**FOSRestBundle**][16] - Adds rest functionality

Enjoy!

[1]:  http://symfony.com/doc/2.7/book/installation.html
[2]:  http://getcomposer.org/
[3]:  https://github.com/MonsieurBon/symfony-graphql-php/archive/master.zip
[4]:  https://github.com/graphql/graphiql
[5]:  https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij
[6]:  http://symfony.com/doc/2.7/quick_tour/the_big_picture.html
[7]:  http://symfony.com/doc/2.7/index.html
[8]:  http://symfony.com/doc/2.7/bundles/SensioFrameworkExtraBundle/index.html
[9]:  http://symfony.com/doc/2.7/book/doctrine.html
[10]: http://symfony.com/doc/2.7/book/templating.html
[11]: http://symfony.com/doc/2.7/book/security.html
[12]: http://symfony.com/doc/2.7/cookbook/email.html
[13]: http://symfony.com/doc/2.7/cookbook/logging/monolog.html
[14]: http://symfony.com/doc/2.7/cookbook/assetic/asset_management.html
[15]: http://symfony.com/doc/2.7/bundles/SensioGeneratorBundle/index.html
[16]: https://github.com/FriendsOfSymfony/FOSRestBundle
