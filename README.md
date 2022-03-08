# Coder

Coder helps you by generating random strings.

## Installation

Use the package manager [composer](https://getcomposer.org/) to install coder.

```bash
composer require misadjalovic/coder
```

## Usage

```php
use Misadjalovic\Coder\Coder;

$coder = new Coder();

# returns 'YUMAWKDFSa'
$coder->generate(1, 10)

# returns 'WVF}]JD2Y!xmGQQnTq!&'
$coder->generate(3, 10)
```
