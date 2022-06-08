<?php
namespace Placecodex\CCoincrypto;
require('Const.php');

use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Key\Factory\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Mnemonic\Bip39\Bip39Mnemonic;
use BitWasp\Bitcoin\Mnemonic\Bip39\Bip39SeedGenerator;
use BitWasp\Bitcoin\Mnemonic\MnemonicFactory;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Network\NetworkFactory;


class Mnemonic
{

    const ETH_DERIVATION_PATH = "44'/60'/0'/0";
    const VET_DERIVATION_PATH = "44'/818'/0'/0";
    const BTC_DERIVATION_PATH = "44'/0'/0'/0";
    const LTC_DERIVATION_PATH = "44'/2'/0'/0";
    const BCH_DERIVATION_PATH = "44'/145'/0'/0";
    const LYRA_DERIVATION_PATH = "44'/497'/0'/0";
    const TESTNET_DERIVATION_PATH = "44'/1'/0'/0";
    const TRON_DERIVATION_PATH = " m/44'/195'/0'";



    public static function btc()
    {

        $network =  Bitcoin::setNetwork(NetworkFactory::bitcoin());

        $random = new Random();
        $privKeyFactory = new PrivateKeyFactory();
        $privateKey = $privKeyFactory->generateCompressed($random);




        $publicKey = $privateKey->getPublicKey();
        $address = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());
        $pk = $privateKey->toWif($network);
        $pkhex = $privateKey->getHex($network);
        $isCompressed = ($privateKey->isCompressed()?"true":"false");


        return   array(

        'privatekey'      =>$pk,
        'coin'  => 'BTC',
        'name'    => 'Bitcoin',
        'network'        => 'mainnet',
        'address'        => $address->getAddress(),
        );

        
     }  




     public static function btctestnet()
    {


        $network =  Bitcoin::setNetwork(NetworkFactory::bitcoinTestnet());
      
 
        $random = new Random();
        $privKeyFactory = new PrivateKeyFactory();
        $privateKey = $privKeyFactory->generateCompressed($random);
        $publicKey = $privateKey->getPublicKey();
        $address = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());
        $pk = $privateKey->toWif($network);
        $pkhex = $privateKey->getHex($network);
        $isCompressed = ($privateKey->isCompressed()?"true":"false");

        return   array(

        'privatekey' =>$pk,
        'coin'  => 'BTC',
        'name'    => 'Bitcoin',
        'network'        => 'testnet',
        'address'        => $address->getAddress(),
        );

        
     }




     public static function ltc()
    {

        $Bitcoin = new Bitcoin();
        $Bitcoin->setNetwork(NetworkFactory::litecoin()
      );
        $network = $Bitcoin->getNetwork();


        $random = new Random();
        $privKeyFactory = new PrivateKeyFactory();
        $privateKey = $privKeyFactory->generateCompressed($random);
        $publicKey = $privateKey->getPublicKey();
        $address = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());
        $pk = $privateKey->toWif($network);
         $pkhex = $privateKey->getHex($network);
        $isCompressed = ($privateKey->isCompressed()?"true":"false");



    
      
        return   array(

        'privatekey'      => $pk,
        'coin'           => 'LTC',
        'name'            => 'Litecoin',
        'network'        => 'mainnet',
        'address'        => $address->getAddress(),
        );

     }


     public static function ltctestnet()
    {

        $Bitcoin = new Bitcoin();
        $Bitcoin->setNetwork(NetworkFactory::litecoinTestnet()
      );
        $network = $Bitcoin->getNetwork();


        $random = new Random();
        $privKeyFactory = new PrivateKeyFactory();
        $privateKey = $privKeyFactory->generateCompressed($random);
        $publicKey = $privateKey->getPublicKey();
        $address = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());
        $pk = $privateKey->toWif($network);


      
        $pkhex = $privateKey->getHex($network);
        $isCompressed = ($privateKey->isCompressed()?"true":"false");

        return   array(  
        'privatekey'     => $pk,
        'coin'           => 'LTC',
        'name'           => 'Litecoin',
        'network'        => 'testnet' ,
        'address'        => $address->getAddress(),
        );

     }
}