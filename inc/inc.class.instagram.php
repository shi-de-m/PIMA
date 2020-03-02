<?php
function number_formatter($num){
    if( $num >= 1000000){
        $num = preg_replace("#(.+)(.+){1}[0-9]{5}$#i", "$1,$2M",$num);
    }else if( $num >= 1000){
        $num = preg_replace("#(.+)(.+){1}[0-9]{2}#", "$1,$2K",$num);
    }
    return $num;
}
Class Instagram {

    /**
     * Le nom du compte instagram (il est dans le lien du compte instagram)
     *
     * @var String
     */
    private $name;
    private $url;//TOSEE : a garder ou pas
    private $json_content;
    public $url_2;



    /**
     * Class constructor.
     */
    public function __construct($name){
        $url = 'https://www.instagram.com/'.$name.'?__a=1';
        $this->url_2 = 'https://www.instagram.com/'.$name;
        $this->url = $url;
        $this->name = $name;
        $this->json_content  = json_decode(file_get_contents($url))->{'graphql'}->{'user'};
    }


    /**
     * fonction pour tester le bon fonctionnement du la Class 
     * elle affche le nom et l'url
     */
    public function peek(){
        echo $this->name .'<br/><br/>';
        echo $this->url_2 . '<br/><br/>';
    }

    /**
     * retourne l'url de l'image du profile du compte instagram
     *
     * @return url 
     */
    public function get_profile_picture(){
        return $this->json_content->{'profile_pic_url'};
    }

    public function get_name(){
        return $this->name;
    }

    public function get_bio(){
        return $this->json_content->{'biography'};
    }

    public function get_username(){
        return $this->json_content->{'username'};
    }

    public function number_of_posts(){
        return $this->json_content->{'edge_owner_to_timeline_media'}->{'count'};
    }

    public function number_followers(){
        $num = $this->json_content->{'edge_followed_by'}->{'count'};
        return number_formatter($num);
    }

    public function number_following(){
        $num = $this->json_content->{'edge_follow'}->{'count'};
        return number_formatter($num);
    }

    /**
     * retourne un tableau qui contient les 12 premieres photos du compte inste
     *  tableau[0]['url'] continet le url de l'image
     *  tableau[0]['comments'] contient le nombre de commentaire
     * tableau[0]['likes'] contient le nombre de j'aime
     * @return tableau
     */

    
    public function posts(){
        $posts = $this->json_content->{'edge_owner_to_timeline_media'}->{'edges'};
        $tab_posts = array();
        for( $i = 0; $i < count($posts) ; $i++){
            $tab_posts[$i]['url'] = $posts[$i]->{'node'}->{'display_url'};
            $tab_posts[$i]['likes'] = number_formatter($posts[$i]->{'node'}->{'edge_liked_by'}->{'count'});
            $tab_posts[$i]['comments'] =  number_formatter($posts[$i]->{'node'}->{'edge_media_to_comment'}->{'count'});
            $tab_posts[$i]['caption'] = $posts[$i]->{'node'}->{'edge_media_to_caption'}->{'edges'}[0]->{'node'}->{'text'};
        }
        return $tab_posts;
    }

    public function show_posts(){
        $posts = $this->json_content->{'edge_owner_to_timeline_media'}->{'edges'};
        $post_html = '';
        for( $i = 0; $i < count($posts) ; $i++){
            $url = $posts[$i]->{'node'}->{'display_url'};
            $likes = number_formatter($posts[$i]->{'node'}->{'edge_liked_by'}->{'count'});
            $comments =  number_formatter($posts[$i]->{'node'}->{'edge_media_to_comment'}->{'count'});
            $caption = $posts[$i]->{'node'}->{'edge_media_to_caption'}->{'edges'}[0]->{'node'}->{'text'};
            $post_html = $post_html .'<div class="img"><img width="80%" src="'.$url.'"><div><strong>Likes :</strong> '.$likes.'</div><div><strong>Comments : </strong>'.$comments.'</div><div>'.$caption.'</div></div>';
        }
        echo '<div class="posts">'.$post_html.'</div>';
    }

    /*
    faire des fonctions pour récuperer le contenu de ?__a=1
    des fonctions pour la récuperation des stats depuis socialblade et exception si cela ne marche pas
    */
}
?>