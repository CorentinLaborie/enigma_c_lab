<?php

function enigma_encode($message, $clef) {
  $alphabet = [
    0 => ["a" , "A"],
    1 => ["b" , "B"],
    2 => ["c" , "C"],
    3 => ["d" , "D"],
    4 => ["e" , "E"],
    5 => ["f" , "F"],
    6 => ["g" , "G"],
    7 => ["h" , "H"],
    8 => ["i" , "I"],
    9 => ["j" , "J"],
    10 => ["k" , "K"],
    11 => ["l" , "L"],
    12 => ["m" , "M"],
    13 => ["n" , "N"],
    14 => ["o" , "O"],
    15 => ["p" , "P"],
    16 => ["q" , "Q"],
    17 => ["r" , "R"],
    18 => ["s" , "S"],
    19 => ["t" , "T"],
    20 => ["u" , "U"],
    21 => ["v" , "V"],
    22 => ["w" , "W"],
    23 => ["x" , "X"],
    24 => ["y" , "Y"],
    25 => ["z" , "Z"],
  ];
  $CodedArr = []; // Phrase finale a reformer // 
  $messagesArr = explode(" ",$message);
  foreach($messagesArr as $messagesKey => $messagesValue){  // BOUCLE 1 //
    $EachWord = []; // Decomposer chaque mots //
    $messageArr = str_split($messagesValue); // Decomposer chaque mots //

    foreach ($messageArr as $messageKey => $messageValue){ // Boucler sur le mot // 

      foreach ($alphabet as $alphabetKey => $alphabetValue){ // Boucler sur l'alphabet // 
        $numberIndex = $alphabetKey+$clef; // Recuperer l'index pour savoir ou t'en est

        if ($messageValue === $alphabetValue[0] || $messageValue === $alphabetValue[1]){ // S'il correspond a l'alphabet //

          if ($numberIndex > 25){ // Si ton index depasse l'alphabet, calme le. Tkt ca marche pour les grandes phrases //
            $numberIndex = $numberIndex - 26;// Si ton index depasse l'alphabet, calme le. Tkt ca marche pour les grandes phrases //
          }

          array_push($EachWord,$alphabet[$numberIndex][1]); // Si Correspond a l'alphabet, le push dans Each Word //
        }
      }
    }
    array_push($CodedArr, implode("", $EachWord)); // PUSHER LE MOT DANS LE TABLEAU FINAL //
  }
  echo "ORIGINAL : " . $message;
  echo "\n";
  $decoded = implode(" ", $CodedArr);
  echo "CODED FACON ROMAINE MAGUEULE : " . $decoded;
  echo "\n";
}

function enigma_decode($message, $clef) {
  $alphabet = [
    0 => ["a" , "A"],
    1 => ["b" , "B"],
    2 => ["c" , "C"],
    3 => ["d" , "D"],
    4 => ["e" , "E"],
    5 => ["f" , "F"],
    6 => ["g" , "G"],
    7 => ["h" , "H"],
    8 => ["i" , "I"],
    9 => ["j" , "J"],
    10 => ["k" , "K"],
    11 => ["l" , "L"],
    12 => ["m" , "M"],
    13 => ["n" , "N"],
    14 => ["o" , "O"],
    15 => ["p" , "P"],
    16 => ["q" , "Q"],
    17 => ["r" , "R"],
    18 => ["s" , "S"],
    19 => ["t" , "T"],
    20 => ["u" , "U"],
    21 => ["v" , "V"],
    22 => ["w" , "W"],
    23 => ["x" , "X"],
    24 => ["y" , "Y"],
    25 => ["z" , "Z"],
  ];
  $messagesArr = explode(" ",$message);
  $CodedArr = []; // Phrase final a reformer // 
  foreach($messagesArr as $messagesKey => $messagesValue){
    $EachWord = []; // Decomposer chaque mots //
    $messageArr = str_split($messagesValue); // Decomposer chaque mots //
    foreach ($messageArr as $messageKey => $messageValue){ // Boucler sur le mot //

      foreach ($alphabet as $alphabetKey => $alphabetValue){ // Boucler sur l'alphabet // 
        $numberIndex = $alphabetKey-$clef; // Recuperer l'index pour savoir ou t'en est

        if ($messageValue === $alphabetValue[0] || $messageValue === $alphabetValue[1]){ // S'il correspond a l'alphabet //

          if ($numberIndex < 0){ // Si ton index va en dessous de  0, calme le. Tkt ca marche pour les grandes phrases //
            $numberIndex = $numberIndex + 26;// Si ton index depasse l'alphabet, calme le. Tkt ca marche pour les grandes phrases //
          }
          array_push($EachWord,$alphabet[$numberIndex][1]); // Si Correspond a l'alphabet, le push dans Each Word //
        }
      }
    }
    array_push($CodedArr, implode("", $EachWord)); // PUSHER LE MOT DANS LE TABLEAU FINAL //
  }
  echo "ORIGINAL : " . $message;
  echo "\n";
  $decoded = implode(" ", $CodedArr);
  echo "CODED FACON ROMAINE MAGUEULE : " . $decoded;
  echo "\n";
}

if ($argv[1] === "encode"){
  enigma_encode($argv[2], intval($argv[3]));
}
elseif ($argv[1] === "decode"){
  enigma_decode($argv[2], intval($argv[3]));
}
else {
  echo "ERROR, LIS LE MAN \n";
}