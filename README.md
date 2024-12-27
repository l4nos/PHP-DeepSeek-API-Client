# DeepSeek API Client for PHP

A PHP client for the DeepSeek API with Laravel support.

## Installation

Install via Composer:

```bash
composer require lanos/deepseek-api
```

For Laravel applications, the package will automatically register the service provider and facade.

## Configuration

Add your DeepSeek API key to your `.env` file:

```env
DEEPSEEK_API_KEY=your_api_key_here
```

Publish the configuration file (optional):

```bash
php artisan vendor:publish --tag=config
```

## Usage

### Laravel

You can use the facade:

```php
use Lanos\DeepSeek\Facades\DeepSeek;

$response = DeepSeek::sendRequest('POST', 'endpoint', ['data' => 'value']);
```

Or use dependency injection:

```php
use Lanos\DeepSeek\Interfaces\DeepSeekClientInterface;

class YourController
{
    public function __construct(
        private DeepSeekClientInterface $deepSeekClient
    ) {}

    public function yourMethod()
    {
        $response = $this->deepSeekClient->sendRequest('POST', 'endpoint', ['data' => 'value']);
    }
}
```

### Standalone Usage

```php
use Lanos\DeepSeek\DeepSeekClient;
use GuzzleHttp\Client;

$client = new DeepSeekClient(new Client(), 'your_api_key');
$response = $client->sendRequest('POST', 'endpoint', ['data' => 'value']);
```

## Testing

Run the tests with:

```bash
composer test
```

## License

MIT
