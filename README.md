# Enumerables

A PHP/Laravel package that enhances Enum usage with various utilities like easy conversion, validation, and additional operations. Designed to streamline working with Enums in Laravel projects, Enumerables optimizes code for clarity and maintainability when handling constants and specific values.

## Installation

To install the `Enumerables` package run the following command in your terminal:

```bash
composer require upward/enumerables
```

## Features

### Enum Case Attributes with Label

The `Enumerables` package provides a way to add a `Label` attribute to your Enum cases, allowing you to define custom text for each case. This can be especially useful for displaying human-readable labels or translating Enum values.

#### Usage Example

Here's how to use the `Label` attribute with an Enum case and retrieve the text:

```php

use Upward\Enumerables\Attributes\Label;
use Upward\Enumerables\Traits\InteractsWithLabel;

enum Status
{
    use InteractsWithLabel;
    
    #[Label(text: 'Active')]
    case ACTIVE;

    #[Label(text: 'Inactive')]
    case INACTIVE;
}

// Accessing the label text
$status = Status::ACTIVE;
echo $status->getLabel(); // Outputs: Active

```

#### Example without Translation
If you want to display the label without translation, set the `translate` option to false:

```php

use Upward\Enumerables\Attributes\Label;
use Upward\Enumerables\Traits\InteractsWithLabel;

enum UserRole
{
    use InteractsWithLabel;

    #[Label(text: 'Administrator', translate: false)]
    case ADMIN;

    #[Label(text: 'Editor', translate: false)]
    case EDITOR;
}

$role = UserRole::ADMIN;
echo $role->getLabel(); // Outputs: Administrator

```
#### Note on Translation
Translations are performed using the default Laravel `__()` function, allowing you to manage language files and translations easily.
