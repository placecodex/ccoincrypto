# coincrypto
A php library for the generation of bitcoin, litecoin and dogecoin wallets

- BTC
*mainnet
*testnet

- LTC
*mainnet
*testnet


- DOGE coming soon
*mainnet
*testnet

# How use 

install 

composer require placecodex/ccoincrypto

use 

require('vendor/autoload.php');

use Placecodex\CCoincrypto\Wallet;

print_r($Wallet->btc());
print_r($Wallet->btctestnet());


print_r($Wallet->ltc());
print_r($Wallet->ltctestnet());


response 

Array ( [privatekey] => cU3kKbuaaC82BTQSr8VWyiLuNGzUh2oBeVsgFhp7CjmqpeqtNXMa [coin] => BTC [name] => Bitcoin [network] => testnet [address] => mu9fCZczwZ7N7gN8hqc8wFe4wEBFqLB4AF )
