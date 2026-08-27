# Dobine
[![Tests](https://github.com/hermajan/dobine/workflows/Tests/badge.svg)](https://github.com/hermajan/dobine/actions?query=workflow%3ATests)
[![Packagist](https://img.shields.io/packagist/v/hermajan/dobine.svg)](https://packagist.org/packages/hermajan/dobine)

<p id="readme-perex">Lightweight library providing useful extensions for <a href="https://www.doctrine-project.org">Doctrine</a> packages.</p>

## ✨ Features
- **Connections** – convenient DBAL connection setup with environment-based and parameter-based configuration.
- **Entities** – base entities with property accessors (including Nette accessors) for rapid entity development.
- **Facades** – base facades to simplify working with the entity manager and repositories.
- **Pagination** – a ready-to-use paginator for splitting query results into pages.
- **Property traits** – reusable traits such as `Identable`, `Creatable`, `Dateable`, `Sluggable`, `Sortable`, `Treeable`, `Translatable`, `Localable`, `Iconable`, `Textable` and `Arrayable`.
- **Subscribers** – event subscribers like a table prefix subscriber for automatic table naming.
- **Custom types** – additional Doctrine types, including an array-with-null type and enum type support.
- **Utilities** – helper utilities such as string helpers.

## 📥 Installation
Install this via [Composer](https://getcomposer.org):
```bash
composer require hermajan/dobine
```

## 📚 Documentation
Usage and documentation for this project is in [wiki](https://github.com/hermajan/dobine/wiki).
