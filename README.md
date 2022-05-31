# coincrypto
 Wallet generator

# BTC
*mainnet
*testnet

# LTC
*mainnet
*testnet


# DOGE coming soon
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
