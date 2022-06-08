<?php
namespace Placecodex\CCoincrypto;
require('Const.php');
use BitWasp\Bitcoin\Key\Factory\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;
use BitWasp\Bitcoin\Mnemonic\Bip39\Bip39SeedGenerator;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Network\NetworkFactory;
use BitWasp\Bitcoin\Script\ScriptType;

// For ethereum addresses
use kornrunner\Keccak;
use BitWasp\Bitcoin\Crypto\EcAdapter\Key\PublicKeyInterface;
use BitWasp\Bitcoin\Crypto\EcAdapter\Impl\PhpEcc\Serializer\Key\PublicKeySerializer;
use BitWasp\Bitcoin\Crypto\EcAdapter\EcAdapterFactory;
use Mdanter\Ecc\Serializer\Point\UncompressedPointSerializer;
use Mdanter\Ecc\EccFactory;

class Privatekey
{

  

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