<?php

ob_start();

include('vendor/autoload.php');

   use Telegram\Bot\Api; 

define('API_KEY','');





$update = json_decode(file_get_contents('php://input'));

$message = $update->message;

$text = $message->text;

$name = $message->from->username;

$chid = $message->chat->id;

if (!file_exists("fayl")) { 

  mkdir("fayl");

}



$mid = $message->message_id;

$id = $message->from->id;

$callback = $update->callback_query;

$dataa = $callback->data;

$callback = $update->callback_query;

$data = $callback->data;

$mid = $callback->message->message_id;

$imid = $callback->inline_message_id;

$callback = $update->callback_query;

$mid = $callback->message->message_id;

$imid = $callback->inline_message_id;



$chat_id2 = $update->callback_query->message->chat->id;

$message_id2 = $update->callback_query->message->message_id;







 function del($nomi){

   array_map('unlink', glob("$nomi"));

   }



 function ty($ch){ 

  return bot('sendChatAction', [

  'chat_id' => $ch,

  'action' => 'typing',

  ]);

} 

function bot($method,$datas=[]){

   $url = "https://api.telegram.org/bot".API_KEY."/".$method;

   $ch = curl_init();

   curl_setopt($ch,CURLOPT_URL,$url);

curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);

   $res = curl_exec($ch);

   if(curl_error($ch)){

    var_dump(curl_error($ch));

   }else{

    return json_decode($res);

   }

}



    function kltoUniversalString($str, $options = array()) 

   {

    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

    $defaults = array

    (

      'delimiter'   => ' ',

      'limit'     => null,

      'lowercase'   => true,

      'replacements'  => array(),

      'transliterate' => true,

    );

    $options = array_merge($defaults, $options);

    $char_map = array

    (

      // Latin

      'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',

      'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',

      'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',

      'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',

      'ß' => 'ss',

      'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',

      'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',

      'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',

      'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',

      'ÿ' => 'y',

      // Latin symbols

      '©' => '(c)',

      // Greek

      'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',

      'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',

      'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',

      'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',

      'Ϋ' => 'Y',

      'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',

      'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',

      'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',

      'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',

      'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

      // Turkish

      'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',

      'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

      // Russian

      'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'Ye', 'Ё' => 'Yo', 'Ж' => 'J',

      'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',

      'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'X', 'Ц' => 'Ts',

      'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '\'', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',

      'Я' => 'Ya',

      'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'j',

      'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',

      'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'x', 'ц' => 'ts',

      'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '\'', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',

      'я' => 'ya',

      // Ukrainian

      'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',

      'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

      // Czech

      'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',

      'Ž' => 'Z',

      'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',

      'ž' => 'z',

      // Polish

      'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',

      'Ż' => 'Z',

      'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',

      'ż' => 'z',

      // Latvian

      'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',

      'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',

      'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',

      'š' => 's', 'ū' => 'u', 'ž' => 'z',

      // Uzbek

      "Ў"=>"O'", "ў"=>"o'", "Ғ"=>"G'", "ғ"=>"g'", "Ҳ"=>"H", "ҳ"=>"h", "Қ"=>"Q", "қ"=>"q",

      //Symbols

      "\"" => "'", "–" => "-", "‘" => "'", "“" => "\"", "”" => "\"", "’" => "'", "´" => "'",

    );



    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

    if ($options['transliterate']) {

      $str = str_replace(array_keys($char_map), $char_map, $str);

    }



    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

    $str = trim($str, $options['delimiter']);

    return $str;

  }

  

    function lktoUniversalString($str, $options = array()) 

   {

    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

    $defaults = array

    (

      'delimiter'   => ' ',

      'limit'     => null,

      'lowercase'   => true,

      'replacements'  => array(),

      'transliterate' => true,

    );



    $options = array_merge($defaults, $options);

    $char_map = array

    (  

    

    'ch' => 'ч',

    'CH' => 'Ч',

    'cH' => 'ч',

    'Ch' => 'Ч',

    

    

 

    'Sh' => 'Ш',

     'sh' => 'ш', 

     'sH' => 'ш',

     'SH' => 'Ш',

     

     

    'yu' => 'ю',

    'YU' => 'Ю',

    'yU' => 'ю',

    'Yu' => 'Ю',

        

        

    'YE' => 'Е', 

     'ye' => 'е',

      'Ye' => 'Е', 

     'yE' => 'е',

     

     

    'YO' => 'Ё',

     'yo' => 'ё',

      'Yo' => 'Ё',

     'yO' => 'ё',

    

    'TS' => 'Ц',

      'ts' => 'ц', 

      'tS' => 'ц',

      'Ts' => 'Ц',



    'YA' => 'Я',

    'Ya' => 'Я',

     'yA' => 'я',

     'ya' => 'я',

     

    

      // Latin

        'À' => 'А', 

        'Á' => 'А', 

        'Â' => 'А', 

        'Ã' => 'А', 

        'Ä' => 'А', 

        'Å' => 'А', 

        'Æ' => 'АЕ', 

        'Ç' => 'С',

        'È' => 'Е', 

        'É' => 'Е', 

        'Ê' => 'Е', 

        'Ë' => 'Е', 

        'Ì' => 'И', 

        'Í' => 'И', 

        'Î' => 'И', 

        'Ï' => 'И',

        'Ð' => 'Д', 

        'Ñ' => 'Н', 

        'Ò' => 'О', 

        'Ó' => 'О', 

        'Ô' => 'О', 

        'Õ' => 'О', 

        'Ö' => 'О', 

        'Ő' => 'О',

        'Ø' => 'О', 

        'Ù' => 'У', 

        'Ú' => 'У', 

        'Û' => 'У', 

        'Ü' => 'У', 

        'Ű' => 'У', 

        'Ý' => 'Й', 

        'Þ' => 'ТХ',

        'ß' => 'СС',

        'à' => 'а', 

        'á' => 'а', 

        'â' => 'а', 

        'ã' => 'а', 

        'ä' => 'а', 

        'å' => 'а', 

        'æ' => 'ае', 

        'ç' => 'с',

        'è' => 'е', 

        'é' => 'е', 

        'ê' => 'е', 

        'ë' => 'е', 

        'ì' => 'и', 

        'í' => 'и', 

        'î' => 'и', 

        'ï' => 'и',

        'ð' => 'д', 

        'ñ' => 'н', 

        'ò' => 'о', 

        'ó' => 'о', 

        'ô' => 'о', 

        'õ' => 'о', 

        'ö' => 'о', 

        'ő' => 'о',

        'ø' => 'о', 

        'ù' => 'у', 

        'ú' => 'у', 

        'û' => 'у', 

        'ü' => 'у', 

        'ű' => 'у', 

        'ý' => 'й', 

        'þ' => 'тн',

        'ÿ' => 'й',

      // Latin symbols

        '©' => '(c)',

      // Greek

        'Α' => 'А', 

        'Β' => 'Б', 

        'Γ' => 'Г', 

        'Δ' => 'Д', 

        'Ε' => 'Е', 

        'Ζ' => 'З', 

        'Η' => 'Ҳ', 

        'Θ' => '8',

        'Ι' => 'И', 

        'Κ' => 'К', 

        'Λ' => 'Л', 

        'Μ' => 'М', 

        'Ν' => 'Н', 

        'Ξ' => 'З', 

        'Ο' => 'О', 

        'Π' => 'П',

        'Ρ' => 'Р', 

        'Σ' => 'С', 

        'Τ' => 'Т', 

        'Υ' => 'Й', 

        'Φ' => 'Ф', 

        'Χ' => 'Х', 

        'Ψ' => 'ПС', 

        'Ω' => 'ДВ',

        'Ά' => 'А', 

        'Έ' => 'Е', 

        'Ί' => 'И', 

        'Ό' => 'О', 

        'Ύ' => 'Й', 

        'Ή' => 'Ҳ', 

        'Ώ' => 'ДВ', 

        'Ϊ' => 'И',

        'Ϋ' => 'Й',

        'α' => 'а', 

        'β' => 'б', 

        'γ' => 'г', 

        'δ' => 'д', 

        'ε' => 'е', 

        'ζ' => 'з', 

        'η' => 'ҳ', 

        

        'θ' => '8',

        'ι' => 'и', 

        'κ' => 'к', 

        'λ' => 'л', 

        'μ' => 'м', 

        'ν' => 'н', 

        'ξ' => 'з', 

        'ο' => 'о', 

        'π' => 'п',

        'ρ' => 'р', 

        'σ' => 'с', 

        'τ' => 'т', 

        'υ' => 'й', 

        'φ' => 'ф', 

        'χ' => 'х', 

        'ψ' => 'пс', 

        'ω' => 'дв',

        'ά' => 'а', 

        'έ' => 'е', 

        'ί' => 'и', 

        'ό' => 'о', 

        'ύ' => 'й', 

        'ή' => 'ҳ', 

        'ώ' => 'дв', 

        'ς' => 'с',

        'ϊ' => 'и', 

        'ΰ' => 'й', 

        'ϋ' => 'й', 

        'ΐ' => 'и',

        

      // Turkish

        'Ş' => 'С', 

        'İ' => 'И', 

        'Ç' => 'Ч', 

        'Ü' => 'У', 

        'Ö' => 'О', 

        'Ğ' => 'Г',

        'ş' => 'с', 

        'ı' => 'и', 

        'ç' => 'ч', 

        'ü' => 'у', 

        'ö' => 'о', 

        'ğ' => 'г',

        

      // Russian

          "O‘"=>"Ў", 

        "o‘"=>"ў",

        "G‘"=>"Ғ", 

        

        "g‘"=>"ғ", 

        

         "O`"=>"Ў", 

        "o`"=>"ў", 

        "G`"=>"Ғ", 

        

        "g`"=>"ғ",

        

        "O'"=>"Ў", 

        "o'"=>"ў", 

        "G'"=>"Ғ", 

        "g'"=>"ғ",

        

        

        

        "H"=>"Ҳ", 

        "h"=>"ҳ", 

        "Q"=>"Қ", 

        "q"=>"қ",

      

   

        'A' => 'А', 

        'B' => 'Б', 

        'V' => 'В', 

        'G' => 'Г', 

        'D' => 'Д', 

         

        'J' => 'Ж',

        'Z' => 'З', 

        'I' => 'И', 

        'Y' => 'Й', 

        'K' => 'К', 

        'L' => 'Л', 

        'M' => 'М', 

        'N' => 'Н', 

        'O' => 'О',

        'P' => 'П', 

        'R' => 'Р', 

        'S' => 'С', 

        'T' => 'Т', 

        'U' => 'У', 

        'F' => 'Ф', 

        'X' => 'Х', 

       

        'Ъ' => 'Ъ', 

        'Ы' => 'Ы', 

        'Ь' => 'Ь', 

        'E' => 'Е', 

      

        'a' => 'а', 

        'b' => 'б', 

        'v' => 'в', 

        'g' => 'г', 

        'd' => 'д', 

      

        'j' => 'ж',

        'z' => 'з', 

        'i' => 'и', 

        'y' => 'й', 

        'k' => 'к', 

        'l' => 'л', 

        'm' => 'м', 

        'n' => 'н', 

        'o' => 'о',

        'p' => 'п', 

        'r' => 'р', 

        's' => 'с', 

        't' => 'т', 

        'u' => 'у', 

        'f' => 'ф', 

        'x' => 'х', 

     

        'ъ' => 'ъ', 

        'ы' => 'ы', 

        'ь' => 'ь', 

        'e' => 'е', 

      

        

      // Ukrainian

        'Є' => 'е', 

        'І' => 'И', 

        'Ї' => 'ЙИ', 

        'Ґ' => 'Г',

        'є' => 'йе', 

        'і' => 'и', 

        'ї' => 'йи', 

        'ґ' => 'г',

        

      // Czech

        'Č' => 'С', 

        'Ď' => 'Д', 

        'Ě' => 'Е', 

        'Ň' => 'Н', 

        'Ř' => 'Р', 

        'Š' => 'С', 

        'Ť' => 'Т', 

        'Ů' => 'У',

        'Ž' => 'З',

        'č' => 'с', 

        'ď' => 'д', 

        'ě' => 'е', 

        'ň' => 'н', 

        'ř' => 'р', 

        'š' => 'с', 

        'ť' => 'т', 

        'ů' => 'у',

        'ž' => 'з',

        

      // Polish

        'Ą' => 'А', 

        'Ć' => 'С', 

        'Ę' => 'е', 

        'Ł' => 'Л', 

        'Ń' => 'Н', 

        'Ó' => 'о', 

        'Ś' => 'С', 

        'Ź' => 'З',

        'Ż' => 'З',

        'ą' => 'а', 

        'ć' => 'с', 

        'ę' => 'е', 

        'ł' => 'л', 

        'ń' => 'н', 

        'ó' => 'о', 

        'ś' => 'с', 

        'ź' => 'з',

        'ż' => 'з',

        

      // Latvian

        'Ā' => 'А', 

        'Č' => 'C', 

        'Ē' => 'Е', 

        'Ģ' => 'Г', 

        'Ī' => 'и', 

        'Ķ' => 'к', 

        'Ļ' => 'Л', 

        'Ņ' => 'Н',

        'Š' => 'С', 

        'Ū' => 'у', 

        'Ž' => 'З',

        'ā' => 'а', 

        'č' => 'с', 

        'ē' => 'е', 

        'ģ' => 'г', 

        'ī' => 'и', 

        'ķ' => 'к', 

        'ļ' => 'л', 

        'ņ' => 'н',

        'š' => 'с', 

        'ū' => 'у', 

        'ž' => 'з',

        

      // Uzbek

    

        

      //Symbols

        "'" => "\"", 

        "-" => "–", 

        "'" => "‘", 

        "\"" => "“", 

        "\"" => "”", 

        "'" => "’", 

        "'" => "ъ",

    );



    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

    if ($options['transliterate']) {

      $str = str_replace(array_keys($char_map), $char_map, $str);

    }



    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

    $str = trim($str, $options['delimiter']);

    return $str;

  }







$update = json_decode(file_get_contents('php://input'));

$message = $update->message;

$text = $message->text;

$name = $message->from->username;

$chid = $message->chat->id;

$step = file_get_contents("fayl"."/$chid"."/a.step");

if (!file_exists("fayl")) { 

  mkdir("fayl");

}

if (!file_exists("fayl"."/$chid")) { 

  mkdir("fayl"."/$chid");

}







if($text == "/start" ){

    

 

    del("fayl"."/$chid"."/a.step");

    bot('sendMessage', [

'chat_id'=>$chid,

'parse_mode'=>'markdown',

'text'=>"*Ushbu bot  lotindan-kirilga va kirildan-lotinga o'tkazib beradi*",

'reply_markup'=>json_encode([

'inline_keyboard'=>[

[['callback_data'=>"k-l","text"=>"kirildan-lotinga"],],

[['callback_data'=>"l-k","text"=>"lotindan-kirilga"],]

]

]),

]);



  



}

if($data == "k-l"){

    ty($chid);

    bot('editMessageText',[

  'chat_id'=>$chat_id2,

   'message_id'=>$message_id2,

   'parse_mode'=>'markdown',

   'text'=>"♻️*️Kirildan Lotinga o'girish uchun text yuboring*♻️",

'reply_markup'=>json_encode([

'inline_keyboard'=>[

[['callback_data'=>"l-k","text"=>"lotindan-kirilga"],]

]

]),

]);

    file_put_contents("fayl"."/$chat_id2"."/a.step","1");

}



$step = file_get_contents("fayl"."/$chid"."/a.step");

if($message->text and $step ==1){

       del("fayl"."/$chat_id2"."/a.step");

    ty($chid);

    $tex=$text;

    $replyh = kltoUniversalString($tex);

        bot('sendMessage', [

'chat_id'=>$chid,

'text'=>"$replyh",

'reply_markup'=>json_encode([

'inline_keyboard'=>[

[['callback_data'=>"k-l","text"=>"kirildan-lotinga"],['callback_data'=>"l-k","text"=>"lotindan-kirilga"],]

]

]),

]);

}



if($data == "l-k"){

    ty($chid);

    bot('editMessageText',[

  'chat_id'=>$chat_id2,

   'message_id'=>$message_id2,

   'parse_mode'=>'markdown',

   'text'=>"♻️*Lotindan  Kirilga o'girish uchun text yuboring*♻️",

'reply_markup'=>json_encode([

'inline_keyboard'=>[

[['callback_data'=>"k-l","text"=>"kirildan-lotinga"],]

]

]),

]);

    file_put_contents("fayl"."/$chat_id2"."/a.step","2");

}





if($message->text and $step == 2){

    del("fayl"."/$chat_id2"."/a.step");

    ty($chid);

    $tex=$text;

    $replyh = lktoUniversalString($tex);

        bot('sendMessage', [

'chat_id'=>$chid,

'text'=>"$replyh",

'reply_markup'=>json_encode([

'inline_keyboard'=>[

[['callback_data'=>"k-l","text"=>"kirildan-lotinga"],['callback_data'=>"l-k","text"=>"lotindan-kirilga"],]

]

]),

]);

}







if($text=="asd"){

    bot('sendPhoto',[

'chat_id'=>$chid,

'parse_mode' => 'markdown',

'photo'=>new CURLFile("a.jpg"),

'caption'=>"*Ushbu bot  lotindan-kirilga va kirildan-lotinga o'tkazib beradi*",

'reply_markup'=>json_encode([

'inline_keyboard'=>[

[['callback_data'=>"k-l","text"=>"kirildan-lotinga"],],

[['callback_data'=>"l-k","text"=>"lotindan-kirilga"],]

]

]),

]);

    

}



?>