<?php

/*
 * This file is part of the php-phantomjs.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace JonnyW\PhantomJs\Tests\Integration;

use JonnyW\PhantomJs\Test\TestCase;
use JonnyW\PhantomJs\Client;
use JonnyW\PhantomJs\DependencyInjection\ServiceContainer;
use JonnyW\PhantomJs\StringUtils;
/**
 * PHP PhantomJs
 *
 * @author Jon Wenmoth <contact@jonnyw.me>
 */
class FuzzTest extends TestCase
{
    /**
     * Test filename
     *
     * @var string
     * @access protected
     */
    protected $filename;

    /**
     * Test directory
     *
     * @var string
     * @access protected
     */
    protected $directory;
    
/** +++++++++++++++++++++++++++++++++++ **/
/** ++++++++++++++ TESTS ++++++++++++++ **/
/** +++++++++++++++++++++++++++++++++++ **/



    /**
     * Test can load cookies from
     * persistent cookie file
     *
     * @access public
     * @return void
     */
    public function testEntries()
    {
        echo "start";
        $inputs = require 'entries.php';
        $url = $inputs['URL'];
        $entries = $inputs['entries'];
        foreach ($entries as $entry) {
            if (strtolower($entry['method']) == 'get') 
            {
                 $this->getTest($url . $entry['URI'], $entry['name'], $entry['parms'], $entry['num_of_tries']);    
            } 
            else if(strtolower($entry['method']) == 'post')
            {
                 $this->postTest($url . $entry['URI'], $entry['name'], $entry['parms'], $entry['num_of_tries']);
            }
            else 
            {
                throw new Exception("Worng HTTP method in " . $entry['name'], 1);    
            }
        }
        
    }

    public function postTest($url, $name, $parms, $num_of_tries)
    {
        for ($i=0; $i < $num_of_tries; $i++) { 
            $client = Client::getInstance();
            $client->getEngine()->setPath('C:\xampp\htdocs\opencart_07\bin\phantomjs.exe');//back to the oter bin 
            $request  = $client->getMessageFactory()->createRequest();
            $response = $client->getMessageFactory()->createResponse();
            
            $data = array();
            foreach ($parms as $parm => $type)
            {
                if (strtolower($type) == 'email') 
                {
                    //$data[$parm] = Generator::generate('email');
                    //randomemail = 'failing@failure.fail';
                    $data[$parm] = StringUtils::random(rand(5, 20)) . '@' . StringUtils::random(rand(5, 12)) . '.' . StringUtils::random(rand(3, 6));
                }
                else if(strtolower(explode('_', $type)[0]) == 'string')
                {
                    $data[$parm] = StringUtils::random(explode('_', $type)[1]);
                }
                else if(strtolower(explode('_', $type)[0]) == 'int')
                {
                    $size = intval(explode('_', $type)[1]);
                    $data[$parm] = rand(
                        pow(10, ($size - 1)), 
                        pow(10, ($size)) - 1
                    );
                }
                else
                {
                    throw new Exception("Worng parameter type in " . $name, 1);
                }  
            }
            
            $request->setMethod('POST');
            $request->setUrl($url);
            $request->setRequestData($data); // Set post data
            
            $client->send($request, $response);
            $msg = "Failure in: ";
            foreach ($data as $key => $value) {
                 
                $msg .= $key . " = " . $value . " ";
            }
            
            $this->assertContains('Warning: ', $response->getContent(), $msg);
            echo "-";
        }
    }

    public function getTest($url, $name, $parms, $num_of_tries)
    {
        for ($i=0; $i < $num_of_tries; $i++) { 
            $client = Client::getInstance();
            $client->getEngine()->setPath('C:\xampp\htdocs\opencart_07\bin\phantomjs.exe');
            $request  = $client->getMessageFactory()->createRequest();
            $response = $client->getMessageFactory()->createResponse();
            
            $data = array();
            foreach ($parms as $parm => $type)
            {
                if (strtolower($type) == 'email') 
                {
                    //$data[$parm] = Generator::generate('email');
                    //randomemail = 'failing@failure.fail';
                    $data[$parm] = StringUtils::random(rand(5, 20)) . '@' . StringUtils::random(rand(5, 12)) . '.' . StringUtils::random(rand(3, 6));
                }
                else if(strtolower(explode('_', $type)[0]) == 'string')
                {
                    $data[$parm] = StringUtils::random(explode('_', $type)[1]);
                }
                else if(strtolower(explode('_', $type)[0]) == 'int')
                {
                    $size = intval(explode('_', $type)[1]);
                    $data[$parm] = rand(
                        pow(10, ($size - 1)), 
                        pow(10, ($size)) - 1
                    );
                }
                else
                {
                    throw new Exception("Worng parameter type in " . $name, 1);
                }  
            }
            
            $request->setMethod('GET');
            if (!strpos($url, '?')) {$url .= "?";}
            foreach ($data as $key => $value) {
                 
                $url .= $key . "=" . $value . "&";
            }
            $request->setUrl($url);
                    
            $client->send($request, $response);
            $msg = "Failure in: ";
            foreach ($data as $key => $value) {
                 
                $msg .= $key . " = " . $value . " ";
            }
            
            $this->assertContains('Product not found!', $response->getContent(), $msg);
            echo "-";
        }
    }

}
