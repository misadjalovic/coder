# Coder

Coder helps you by generating random strings.

## Installation

Add to your project's composer.json file.

```bash
 "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/misadjalovic/coder.git"
        }
    ],
    
```
Add require the package.

```bash
 "misa/djalovic" : "dev"
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
