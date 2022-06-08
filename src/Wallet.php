<?php
namespace Placecodex\CCoincrypto;
require('Const.php');
use BitWasp;
use BitWasp\Bitcoin\Address\AddressFactory;
use BitWasp\Bitcoin\Address\AddressCreator;
use BitWasp\Bitcoin\Transaction\TransactionOutput;
use BitWasp\Bitcoin\Transaction\OutPoint;
use BitWasp\Bitcoin\Transaction\TransactionInput;

use BitWasp\Bitcoin\Transaction\TransactionFactory;
use BitWasp\Bitcoin\Transaction\Factory\Signer;
use BitWasp\Bitcoin\Transaction\Factory\SignData;
use BitWasp\Bitcoin\Transaction\Factory\TxBuilder;
use BitWasp\Bitcoin\Script\ScriptFactory;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;
use BitWasp\Bitcoin\Key\Factory\PublicKeyFactory;


use BitWasp\Bitcoin\Script\P2shScript;
use BitWasp\Buffertools\Buffer;
use BitWasp\Bitcoin\Script\WitnessScript;

use BitWasp\Bitcoin\Script\WitnessProgram;
use BitWasp\Bitcoin\Address\SegwitAddress;

//NetworkFactory
use BitWasp\Bitcoin\Network\NetworkFactory;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Crypto\Random\Random;


//use BitWasp\Bitcoin\Key\PrivateKeyFactory;
use BitWasp\Bitcoin\Key\Deterministic\HdPrefix\GlobalPrefixConfig;
use BitWasp\Bitcoin\Key\Deterministic\HdPrefix\NetworkConfig;
use BitWasp\Bitcoin\Network\Slip132\BitcoinRegistry;
use BitWasp\Bitcoin\Network\Slip132\BitcoinTestnetRegistry;
use BitWasp\Bitcoin\Key\Deterministic\Slip132\Slip132;
use BitWasp\Bitcoin\Key\KeyToScript\KeyToScriptHelper;
//use BitWasp\Bitcoin\Key\Deterministic\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Key\Factory\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Key\Deterministic\HierarchicalKeySequence;
use BitWasp\Bitcoin\Key\Deterministic\MultisigHD;
use BitWasp\Bitcoin\Serializer\Key\HierarchicalKey\Base58ExtendedKeySerializer;
use BitWasp\Bitcoin\Serializer\Key\HierarchicalKey\ExtendedKeySerializer;

use BitWasp\Buffertools\Buffertools;

class Wallet
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