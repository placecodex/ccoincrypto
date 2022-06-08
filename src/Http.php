<?php
namespace Placecodex\CCoincrypto;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
//use Illuminate\Support\Str;
//use Illuminate\Support\Collection;

//use Log;
//use Config;
use Exception;


class Http 
{
  public static $network;
  //public  $apiKey;
  public  $api_key_testnet;
  public  $api_key;
  public  $Api_url ='http://52.3.8.64:3000';


    //
    public function __construct()
  { //$this->apiKey ='';
  $this->network =  111;
  $this->api_key_testnet =111;
  $this->api_key = 1111;
 //$this->Api_url = env('JS_APP_API_URL', 'http://localhost:3000');

  }



  static function status(){
    return true;
}




/**
 * [apiKey description]
 * @return [type] [description]
 */
  static function apiKey(){

  if($this->network == 'testnet'){
    return (string)$this->api_key_testnet;
  } return (string)$this->$api_key;
  }// end function


  /** Make A POST Request to Tatum Api Endpoint **/
   public static function post($data, $path){
        $client = new Client();
        $request = $client->request('POST',
          self::$Api_url.$path, [
        'headers' => [
          'x-api-key' => self::apiKey(),
      ],'form_params' => $data,
      ]);
     return $request->getBody()->getContents();      

  }//

  /** Make A POST Request encrypter
    this func encryp the data sent to server
   **/
   public static function postEncrypter($data, $path){
        $dataEncrypted = array(
             'dataEncrypted'=> Crypt::encrypt($data),
        ); 
        $client = new Client();
        $request = $client->request('POST',
          self::$Api_url.$path, [
        'headers' => [
          'x-api-key' => self::apiKey(),
      ],'form_params' =>$dataEncrypted,


      ]);
     return $request->getBody()->getContents();      

  }//

  /** Make A POST Request to Tatum Api Endpoint **/
   public static function postEncrypted($data, $path){
        $client = new Client();
        $request = $client->request('POST',
          self::$Api_url.$path, [
        'headers' => [
          'x-api-key' => self::apiKey(),
      ],'form_params' => $data,
      ]);
     $postEncrypted = $request->getBody()->getContents();    
      $array  = json_decode($postEncrypted,true); 

      return $array; 

  }//


  /** Make A GET Request to Tatum Api Endpoint **/
       protected static function getDecoder($path){

      $client = new Client();
      $request = $client->request('GET',
        self::$Api_url.$path,[
      'headers' => [
        'x-api-key' => self::apiKey(),
    ]]);
   //return $request->getBody()->getContents();  

   $getEncrypted = $request->getBody()->getContents();
    $decrypted = Crypt::decryptString($getEncrypted); return $decrypted;    

}//





  /** Make A POST Request to Tatum Api Endpoint **/
  static function put($data, $path){

        $client = new Client();
        $request = $client->request('PUT', 
          self::$Api_url.$path, [
        'headers' => [
        'x-api-key' => self::apiKey(),
        ],'form_params' => $data,
     ]);
     return $request->getBody()->getContents();      

  }//

/** Make A GET Request to Tatum Api Endpoint **/
       protected static function get($path){

      $client = new Client();
      $request = $client->request('GET',
        self::$Api_url.$path,[
      'headers' => [
        'x-api-key' => self::apiKey(),
    ]]);
   return $request->getBody()->getContents();      

}//

/** Make A GET Request to Tatum Api Endpoint **/
       protected static function clearget($path){

      $client = new Client();
      $request = $client->request('GET',self::$Api_url.$path,[
      'headers' => [
        'x-api-key' => self::apiKey(),
    ]]);
   return $request->getBody()->getContents();      

}//

/** Make A DELETE Request to Tatum Api Endpoint **/
       protected static function delete($path){

     $client = new Client();
      $request = $client->request('DELETE',self::$Api_url.$path,[
      'headers' => [
        'x-api-key' => self::apiKey(),
    ]]);
   return $request->getBody()->getContents();      

}//





//end generate wallet

//tron
public static function AddressValidator(
    $address,
    $coin,
    $network
     ){

       
  return self::get("/address/{$address}/{$coin}/{$network}");

; 
}





///GET BALANCES
static function tronGetMainnetBalance($address){
    return self::get("/tron/get/balance/address/mainnet/".$address);
}
static function tronGetTestnetBalance($address){
    return self::get("/tron/get/balance/address/testnet/".$address);
}


static function tronGetBalanceNetwork($address,$network){
///GET BALANCES

if($network == 'testnet'){
 return self::get("/tron/get/balance/address/testnet/".$address);

}elseif($network == 'mainnet'){
 return self::get("/tron/get/balance/address/mainnet/".$address);
}//end if

}//end funct





static function BscGetBalanceNetwork($address,$network){
///GET BALANCES

if($network == 'testnet'){
 return self::get("/bsc/get/balance/address/testnet/".$address);

}elseif($network == 'mainnet'){
 return self::get("/bsc/get/balance/address/mainnet/".$address);
}//end if

}//end funct




static function CeloGetBalanceNetwork($address,$network){
///GET BALANCES

if($network == 'testnet'){
 return self::get("/celo/get/balance/address/testnet/".$address);

}elseif($network == 'mainnet'){
 return self::get("/celo/get/balance/address/mainnet/".$address);
}//end if

}//end funct



static function EthGetBalanceNetwork($address,$network){
///GET BALANCES

if($network == 'testnet'){
 return self::get("/eth/get/balance/address/testnet/".$address);

}elseif($network == 'mainnet'){
 return self::get("/eth/get/balance/address/mainnet/".$address);
}//end if

}//end funct

static function MaticGetBalanceNetwork($address,$network){
///GET BALANCES

if($network == 'testnet'){
 return self::get("/eth/get/balance/address/testnet/".$address);

}elseif($network == 'mainnet'){
 return self::get("/eth/get/balance/address/mainnet/".$address);
}//end if


}//end funct



static function CusdGetBalanceNetwork($address,$network){
///GET BALANCES

if($network == 'testnet'){
 return self::get("/cusd/get/balance/address/testnet/".$address);

}elseif($network == 'mainnet'){
 return self::get("/cusd/get/balance/address/mainnet/".$address);
}//end if

}//end funct



///GET BALANCES DOGE
static function dogeGetMainnetBalance($address){
    return self::get("/doge/get/balance/mainnet/".$address);
}
static function dogeGetTestnetBalance($address){
    return self::get("/doge/get/balance/testnet/".$address);
}


///GET BALANCES LTC
static function ltcGetMainnetBalance($address){
    return self::get("/ltc/get/balance/mainnet/".$address);
}
static function ltcGetTestnetBalance($address){
    return self::get("/ltc/get/balance/testnet/".$address);
}


///GET BALANCES BTC
static function btcGetMainnetBalance($address){
    return self::get("/btc/get/balance/mainnet/".$address);
}
static function btcGetTestnetBalance($address){
    return self::get("/btc/balance/testnet/".$address);
}



static function dogeGetBalanceNetwork($address,$network){
///GET BALANCES
if($network == 'testnet'){
 return self::get("/doge/balance/testnet/address/".$address);
}elseif($network == 'mainnet'){
  return self::get("/doge/balance/mainnet/address/".$address);

}//end if

}//end funct


static function btcGetBalanceNetwork($address,$network){
///GET BALANCES
if($network == 'testnet'){
 return self::get("/btc/balance/testnet/addres/".$address);
}elseif($network == 'mainnet'){
  return self::get("/btc/balance/mainnet/addres/".$address);

}//end if

}//end funct





static function ltcGetBalanceNetwork($address,$network){
///GET BALANCES
if($network == 'testnet'){
 return self::get("/ltc/balance/address/testnet/".$address);
}elseif($network == 'mainnet'){
  return self::get("/ltc/balance/address/mainnet/".$address);

}//end if

}//end funct



/**

///GET BALANCES DOGE
static function bitcoinGetMainnetBatch($address){
    return self::get("/btc/batch/balance/mainnet".$address);
}
static function bitcoinGetTestnetBatch($address){
    return self::get("/btc/batch/balance/testnet".$address);
}



// get batch btc network
static function btcGetBatchBalanceNetwork($address,$network){
$data = array(
             'address'=> $address 
        ); 
if($network == 'testnet'){
 return self::post($data, "/btc/batch/balance/testnet");
}elseif($network == 'mainnet'){ 
  return self::post($data, "/btc/batch/balance/mainnet");
}//end if
}//end funct
**/
// get batch doge network




///GENERATE WALLETS TESTNET MAINNET


///GENERATE WALLETS TESTNET MAINNET
static function xlmGenerateMainnetAddress(){
    return self::getDecoder("/xlm/generate/address/mainnet");
}
static function xlmGenerateTestnetAddress(){
    return self::get("/xlm/generate/address/testnet");
}


///GENERATE WALLETS TESTNET MAINNET
static function bscGenerateMainnetAddress(){
    return self::getDecoder("/bsc/generate/address/mainnet");
}
static function bscGenerateTestnetAddress(){
    return self::get("/bsc/generate/address/testnet");
}




///GENERATE WALLETS TESTNET MAINNET
static function xrpGenerateMainnetAddress(){
    return self::getDecoder("/xrp/generate/address/mainnet");
}
static function xrpGenerateTestnetAddress(){
    return self::get("/xrp/generate/address/testnet");
}


static function btcGenerateMainnetAddress(){
    return self::getDecoder("/btc/generate/address/mainnet");
}
static function btcGenerateTestnetAddress(){
    return self::get("/btc/generate/address/testnet");
}
static function dogeGenerateMainnetAddress(){
    return self::getDecoder("/doge/generate/address/mainnet");
}
static function dogeGenerateTestnetAddress(){
    return self::get("/doge/generate/address/testnet");
}
static function ltcGenerateMainnetAddress(){
    return self::getDecoder("/ltc/generate/address/mainnet");
}
static function ltcGenerateTestnetAddress(){
    return self::get("/ltc/generate/address/testnet");
}
static function tronGenerateMainnetAddress(){
    return self::getDecoder("/tron/generate/address/mainnet");
}






static function tronGenerateTestnetAddress(){
    return self::get("/tron/generate/address/testnet");
}
static function ethGenerateMainnetAddress(){
    return self::getDecoder("/eth/generate/address/mainnet");
}
static function ethGenerateTestnetAddress(){
    return self::get("/eth/generate/address/testnet");
}
static function celoGenerateMainnetAddress(){
    return self::getDecoder("/celo/generate/address/mainnet");
}
static function celoGenerateTestnetAddress(){
    return self::get("/celo/generate/address/testnet");
}
static function cusdGenerateMainnetAddress(){
    return self::getDecoder("/cusd/generate/address/mainnet");
}
static function cusdGenerateTestnetAddress(){
    return self::get("/cusd/generate/address/testnet");
}


static function maticGenerateMainnetAddress(){
    return self::getDecoder("/matic/generate/address/mainnet");
}
static function maticGenerateTestnetAddress(){
    return self::get("/matic/generate/address/testnet");
}


public static function GeneraWallet(
    $network, $symbol)
    {
        if ($network =='testnet' && $symbol==
            'BTC') {
            return self::btcGenerateTestnetAddress();

         }else if ($network =='mainnet' && $symbol=='BTC') {
             return self::btcGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'LTC') {
             return self::ltcGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'LTC') {
             return self::ltcGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol=='DOGE') {
             return self::dogeGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol=='DOGE') {
             return self::dogeGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'TRON') {
             return self::tronGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'TRON') {
             return self::tronGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'TRX') {
             return self::tronGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'TRX') {
             return self::tronGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'XLM') {
             return self::xlmGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'XLM') {
             return self::xlmGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'XRP') {
             return self::xrpGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'XRP') {
             return self::xrpGenerateMainnetAddress(); 
        }



        else if ($network =='testnet' && $symbol==
            'CELO') {
             return self::celoGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'CELO') {
             return self::celoGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'ETH') {
             return self::ethGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'ETH') {
             return self::ethGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'CUSD') {
             return self::cusdGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'CUSD') {
             return self::cusdGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'BSC') {
             return self::bscGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'BSC') {
             return self::bscGenerateMainnetAddress(); 
        }else if ($network =='testnet' && $symbol==
            'MATIC') {
             return self::maticGenerateTestnetAddress(); 
        }else if ($network =='mainnet' && $symbol==
            'MATIC') {
             return self::maticGenerateMainnetAddress(); 
        }


   }

//end generate wallet

public static function GeneraWalletEncrypted($network,$coin ){
        $data = array(
             'network'=>  $network,
             'coin'=> $coin ,

        );   
  $postEncrypted = self::postEncrypted($data, "/wallets/create");
  $array  = json_decode($postEncrypted,true);
  //$decrypted = Crypt::decryptString($array['encrypted']);

   return $decrypted;

; 
}




//tron
public static function EthERC20Transactions(
    $contract_address,
    $address,
     $fromBlock
     ){
        $data = array(
             'contract_address'=> $contract_address,
             'address'=> $address ,
             'fromBlock'=> $fromBlock

        );   
  $post= self::post($data, "/eth/erc20/transaction");
  return json_decode($post,false);

; 
}








//end generate wallet

//tron
public static function TronPrepareAndSendTransactionMainnet(
    $fromPrivateKey,
    $amount,
    $to
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,

        );   
  $post= self::post($data, "/tron/PrepareAndSendTransactionMainnet");
  return json_decode($post,true);

; 
}



public static function TronPrepareAndSendTransactionTestnet(
    $fromPrivateKey,
    $amount,
    $to
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,

        );   
  $post= self::post($data, "/tron/PrepareAndSendTransactionTestnet");
  return json_decode($post,true);

; 
}


// end tron



//start eth
public static function EthPrepareAndSendTransactionMainnet(
     $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );    
  $post= self::post($data, "/eth/PrepareAndSendTransactionMainnet");
  return json_decode($post,true);

; 
}



public static function EthPrepareAndSendTransactionTestnet(
     $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );    
  $post= self::post($data, "/eth/PrepareAndSendTransactionTestnet");
  return json_decode($post,true);

; 
}





//start Celo
public static function CeloPrepareAndSendTransactionMainnet(
      $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );   
  $post= self::post($data, "/celo/PrepareAndSendTransactionMainnet");
  return json_decode($post,true);

; 
}



public static function CeloPrepareAndSendTransactionTestnet(
    $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );   
  $post= self::post($data, "/celo/PrepareAndSendTransactionTestnet");
  return json_decode($post,true);

; 
}







//start Matic
public static function MaticPrepareAndSendTransactionMainnet(
      $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );   
  $post= self::post($data, "/matic/PrepareAndSendTransactionMainnet");
  return json_decode($post,true);

; 
}



public static function MaticPrepareAndSendTransactionTestnet(
    $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );   
  $post= self::post($data, "/matic/PrepareAndSendTransactionTestnet");
  return json_decode($post,true);

; 
}






//start Bsc
public static function BscPrepareAndSendTransactionMainnet(
      $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );   
  $post= self::post($data, "/bsc/PrepareAndSendTransactionMainnet");
  return json_decode($post,true);

; 
}



public static function BscPrepareAndSendTransactionTestnet(
    $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );   
  $post= self::post($data, "/bsc/PrepareAndSendTransactionTestnet");
  return json_decode($post,true);

; 
}




//start Cusd
public static function CusdPrepareAndSendTransactionMainnet(
     $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );    
  $post= self::post($data, "/cusd/PrepareAndSendTransactionMainnet");
  return json_decode($post,true);

; 
}



public static function CusdPrepareAndSendTransactionTestnet(
     $fromPrivateKey,
    $amount,
    $to,
    $gasLimit,
    $gasPrice
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'amount'=> $amount ,
             'to'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );    
  $post= self::post($data, "/cusd/PrepareAndSendTransactionTestnet");
  return json_decode($post,true);

; 
}








//start custodial ERC20
public static function ERC20CustodialPrepareAndSendTransactionMainnet(
     $fromPrivateKey,
    $chain,
    $custodialAddress,
    $tokenAddress,
    $amount,
    $to,
    $gasLimit ='',
    $gasPrice=''
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'chain'=> $chain ,
             'custodialAddress'=> $custodialAddress ,
             'tokenAddress'=>  $tokenAddress,
             'amount'=> $amount ,
             'recipient'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );     
  $post= self::post($data, "/custodial/send_no_batch_transfer_main");
  return json_decode($post,true);

; 
}



public static function ERC20CustodialPrepareAndSendTransactiontestnet(
    $fromPrivateKey,
    $chain,
    $custodialAddress,
    $tokenAddress,
    $amount,
    $to,
    $gasLimit ='',
    $gasPrice=''
     ){
        $data = array(
             'fromPrivateKey'=>  $fromPrivateKey,
             'chain'=> $chain ,
             'custodialAddress'=> $custodialAddress ,
             'tokenAddress'=>  $tokenAddress,
             'amount'=> $amount ,
             'recipient'=> $to ,
              'gasLimit'=> $gasLimit ,
             'gasPrice'=> $gasPrice

        );   
  $post= self::post($data, "/custodial/send_no_batch_transfer_test");
  return json_decode($post,true);

; 
}
//end custodial ERC20
        


}//
