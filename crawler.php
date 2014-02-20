<html>
    <head><title>Web Crawler</title></head>
    <body>
        <form method="post" action="<?php $_SERVER["PHP_SELF"]?>">
            <label>Please Enter URL Here:</label> <input type="text" name="url">
            
            <input type="submit" value="SUBMIT">
        </form>
    </body>
</html>



<?php


function crawler($url){
    
        $return = array();
    
        $dom = new domDocument;

        
        @$dom->loadHTML(file_get_contents($url));

        
        $dom->preserveWhiteSpace = false;

        
        $links = $dom->getElementsByTagName('a');
    
        
        foreach ($links as $htmlTag)
        {
            $return[$htmlTag->getAttribute('href')] = $htmlTag->childNodes->item(0)->nodeValue;
        }

        return $return;

    
}
   if(!empty($_POST['url'])){
       
        $post = $_POST['url'];
       
        $urls = crawler($post);
       
        foreach($urls as $key=>$value)
        {
            echo $key . ' - '. $value . '<br >';
        }
   }else{
       echo "No URL provided";
   }
        
        
   
   


?>