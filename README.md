# tnigr-display-magic-info

## Overview

This project, **tnigr-display-magic-info**, is a versatile tool that facilitates the demonstration and management of tokens using speech synthesis capabilities. The project includes root files `index.php` and `demo.php`, providing functionalities for CRUD operations related to tokens.

## Table of Contents

- [Overview](#overview)
- [Getting Started](#getting-started)
  - [Voice App - Root file `index.php`](#voice-app---root-file-indexphp)
  - [Demo App - Root file `demo.php`](#demo-app---root-file-demophp)
- [Folder Structure](#folder-structure)
- [Database Structure](#database-structure)
  - [Tables](#tables)
    - [tokens](#tokens)
- [Author Information](#author-information)

## Getting Started

### Voice App - Root file `index.php`

1. Setup your database by importing the `register_office.sql` file.
2. Configure the database credentials in `index.php` at Lines 4-6.
3. Utilizes the powerful speech synthesis library [`responsiveVoice`](https://responsivevoice.org/api/). The previous package used was [`mespeak.js`](https://www.masswerk.at/).

### Demo App (Add/Update/Show list of tokens) - Root file `demo.php`

1. Set up the same initialized database credentials in `database.php` at Lines 4-8.
2. Configure the database credentials in `demo.php` at Lines 77-79.
3. CRUD operations are handled in `crud.php` and `register_office.php`.

## Folder Structure

```plaintext
/tnigr-display-magic-info
│
├── /css
├── /img
├── /js
├── /ajax
├── /mespeak
├── crud.php
├── database.php
├── index.php
├── demo.php
├── register_office.php
├── register_office.sql
├── README.md
```

## Database Structure

### Tables

#### `tokens`

| Field            | Type         | Description             |
|------------------|--------------|-------------------------|
| id               | INT          | Token ID (Primary Key)  |
| token_no         | VARCHAR(50)  | Token Number            |
| token_name       | VARCHAR(100) | Token Name              |
| token_name_tamil | VARCHAR(100) | Token Name (Tamil)      |
| speak_status     | INT          | Speak Status            |

## Author Information
- **Author**: [Ridwan](https://qridwan.com)
- **Company**:[Bipolar Factory](https://bipolarfactory.com)
