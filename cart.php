<?php session_start();
class Cart {
    protected $cart_contents = array();
    
     function construct(){
       
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL;
        if ($this->cart_contents === NULL){
            
            $this->cart_contents = array('total_items' => 0);
    {
 function contents(){
        
        $cart = array_reverse($this->cart_contents);
unset($cart['total_items']);

        return $cart;
    }
     function get_item($row_id){
        return (in_array($row_id, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_id]))
            ? FALSE
            : $this->cart_contents[$row_id];
    }
     function total_items(){
        return $this->cart_contents['total_items'];
    }
    function save_cart(){
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
        foreach ($this->cart_contents as $key => $val){
            if(!is_array($val) ){
                continue;
            }
     
            
            $this->cart_contents['total_items'] += $val['qty'];
            }
        
        if(count($this->cart_contents) <= 2){
            unset($_SESSION['cart_contents']);
            return FALSE;
        }else{
            $_SESSION['cart_contents'] = $this->cart_contents;
            return TRUE;
        }
    }
    
}
    
    
?>
<!DOCTYPE html>
        <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        </head>
<body>
    <?php
    $songs = array(
        'id' => $row['song_id']);
    
    
    ?>
</body>
</html>
    