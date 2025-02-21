<?php

function get_all_contacts(){
    $contacts=[];
if(file_exists("contacts/contacts.json")){
    $contacts = json_decode(file_get_contents('contacts/contacts.json'), true);
}
return $contacts;
}
function search($search_name){
    $results=[];
    $contacts=get_all_contacts();
    foreach($contacts as $contact){
        if (preg_match("/$search_name/", $contact['name'])) {
           
            $results[] = $contact;
        }
    }
    return $results;
}

function validate_contact($contact,&$errors){
    $valid=true;
    if(!validate_name($contact['name'])){
        $errors['name']="Invalid name. Only letters and spaces are allowed";
        $valid=false;
    }
    if(!validate_email($contact["email"])){
        $errors["email"]= "Invalid Email";
        $valid=false;
    }
    if(!validate_phone($contact["phone"])){
        $errors["phone"]= "Enter Correct Phone Number";
        $valid=false;
    }
    return $valid;
}

function validate_name($name){
    return preg_match("/^[a-zA-Z ]+$/", $name) ;
}

function validate_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) ;
}
 function validate_phone($phone){
    return preg_match("/^\+?\d{10,15}$/", $phone) ; 
 }

 function putJSON($data){
    $contacts=get_all_contacts();
    $contacts[]=$data;
    file_put_contents('contacts/contacts.json',json_encode($contacts,JSON_PRETTY_PRINT));
  }
?>