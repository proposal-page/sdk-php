# Changelog

All notable changes to `proposal-page/sdk-php` will be documented in this file.

## 0.3.0 - 2019-04-30
- added the optional parameters `page` (default = 1) and `itemsPerPage` (default = 6) to the listTemplates method.
- it's possible to list project templates with a specific page and with a specific quantity of items per page.

## 0.2.0 - 2019-04-30
- added the optional parameters `page` (default = 1) and `itemsPerPage` (default = 6) to the listProjects method.
- it's possible to list projects with a specific page and with a specific quantity of items per page.

## 0.1.1 - 2019-04-29

- added the flag `setToken` (default = true) to the authenticate method. When the flag its true, the Auth Token is automatically set on the client when the method authenticate is called.

## 0.1.0 - 2019-04-24

- initial release
