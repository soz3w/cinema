<?php
/**
 * Created by PhpStorm.
 * User: wap25
 * Date: 29/01/15
 * Time: 10:37
 */

namespace Cinema\BoBundle\Services;
use Abraham\TwitterOAuth\TwitterOAuth;


class Twitter {
    protected $nbTwit;
    protected $compte;
    protected $message;

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    protected $Consumer_Key='YTZnGzyFZPE02KtZNeh5z1FO8';
    protected $Consumer_Secret ='JNbA3kXX0xUOC82vdAnsle15H63MEJqDd8Z3DmCRdF9txuLMQu';
    protected $access_token='562950146-IZJOQNSxEhkg7VFPWr0fojxLgTu6c9fzMxvWsgaG';
    protected $access_token_secret='p8zsA8yllXIJaQyPLW4xmcM90MRD2phl7R8PTna2PEkQq';

    public function __construct($nbTwit,$compte,$message){
        $this->compte=$compte;
        $this->nbTwit=$nbTwit;
        $this->message=$message;

    }

    /**
     * @return mixed
     */
    public function getNbTwit()
    {
        return $this->nbTwit;
    }

    /**
     * @param mixed $nbTwit
     */
    public function setNbTwit($nbTwit)
    {
        $this->nbTwit = $nbTwit;
    }


    /**
     * @return mixed
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * @param mixed $compte
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;
    }



    public function getTweets()
    {

        $connection = new TwitterOAuth($this->Consumer_Key, $this->Consumer_Secret, $this->access_token, $this->access_token_secret);
        $connection->ssl_verifypeer=true;
        $content = $connection->get("statuses/user_timeline",array('screen_name'=>$this->compte,'count'=>$this->nbTwit));

        return $content;
    }
    public function postTweet()
    {

        $connection = new TwitterOAuth($this->Consumer_Key, $this->Consumer_Secret, $this->access_token, $this->access_token_secret);
        $connection->ssl_verifypeer=true;
        $statues = $connection->post("statuses/update",array('status'=>$this->message));

        return $statues;
    }
    public function deleteTweet($id)
    {

        $connection = new TwitterOAuth($this->Consumer_Key, $this->Consumer_Secret, $this->access_token, $this->access_token_secret);
        $connection->ssl_verifypeer=true;
        $statues = $connection->post("statuses/destroy/".$id, array('status'=>$this->message));
//die(var_dump($id));
        return $statues;
    }


}