<?php
    $type = $_POST["type"];
    $page = $_POST["page"];
    $html = file_get_contents("../home.html");
    $url_actual1 = "";
    $url_actual2 = "";
    $url_actual3 = "";
    $url1 = "";
    $url2 = "";
    $url3 = "";
    $name_actual1 = "";
    $name_actual2 = "";
    $name_actual3 = "";
    $name1 = "";
    $name2 = "";
    $name3 = "";
    $id_actual1 = "";
    $id_actual2 = "";
    $id_actual3 = "";
    $id1 = "";
    $id2 = "";
    $id3 = "";
    if ($type == "anime"){
        if ($page == 1){
            $url_actual1 = "https://lh3.googleusercontent.com/d/128MNvhzJFCZqqPPA-6mZgp766690dzHu";
            $url1 = "https://lh3.googleusercontent.com/d/1MWcgEM-U663BF0YDzC5xXfcvPTpmI--q";
            $name_actual1 = "id=\"titleAnime1\">Kill La Kill";
            $name1 = "id=\"titleAnime1\">Hunter X Hunter";
            $id_actual1 = "<input id=\"idAnime1\" type=\"hidden\" name=\"id\" value=\"2\">";
            $id1 = "<input id=\"idAnime1\" type=\"hidden\" name=\"id\" value=\"5\">";
            $url_actual2 = "https://lh3.googleusercontent.com/d/1VXMMzg5rmMFVvehesjgYSET8_MOJbMKn";
            $url2 = "https://lh3.googleusercontent.com/d/1XlIF18J9e0zp-kMrqM9pJvjxXDhZk25g";
            $name_actual2 = "id=\"titleAnime2\">Chainsaw Man";
            $name2 = "id=\"titleAnime2\">One Piece";
            $id_actual2 = "<input id=\"idAnime2\" type=\"hidden\" name=\"id\" value=\"3\">";
            $id2 = "<input id=\"idAnime2\" type=\"hidden\" name=\"id\" value=\"1\">";
            $url_actual3 = "https://lh3.googleusercontent.com/d/1fqe3oF3q32oU9Sog0w3NCQPwfBg6p2e4";
            $url3 = "https://lh3.googleusercontent.com/d/1D2_Mm_TRN5rlA5C_Mo1VKpCdZvzhXgcO";
            $name_actual3 = "id=\"titleAnime3\">Suzumiya Haruhi No Yuutsu";
            $name3 = "id=\"titleAnime3\">Jojo's Bizarre Adventures";
            $id_actual3 = "<input id=\"idAnime3\" type=\"hidden\" name=\"id\" value=\"4\">";
            $id3 = "<input id=\"idAnime3\" type=\"hidden\" name=\"id\" value=\"6\">";
            $page_actual = "<input id=\"nextPageAnime\" type=\"hidden\" name=\"page\" value=\"1\">";
            $page = "<input id=\"nextPageAnime\" type=\"hidden\" name=\"page\" value=\"2\">";
        } else {
            $url_actual1 = "https://lh3.googleusercontent.com/d/1MWcgEM-U663BF0YDzC5xXfcvPTpmI--q";
            $url1 = "https://lh3.googleusercontent.com/d/128MNvhzJFCZqqPPA-6mZgp766690dzHu";
            $name_actual1 = "id=\"titleAnime1\">Hunter X Hunter";
            $name1 = "id=\"titleAnime1\">Kill La Kill";
            $id_actual1 = "<input id=\"idAnime1\" type=\"hidden\" name=\"id\" value=\"5\">";
            $id1 = "<input id=\"idAnime1\" type=\"hidden\" name=\"id\" value=\"2\">";
            $url_actual2 = "https://lh3.googleusercontent.com/d/1XlIF18J9e0zp-kMrqM9pJvjxXDhZk25g";
            $url2 = "https://lh3.googleusercontent.com/d/1VXMMzg5rmMFVvehesjgYSET8_MOJbMKn";
            $name_actual2 = "id=\"titleAnime2\">One Piece";
            $name2 = "id=\"titleAnime2\">Chainsaw Man";
            $id_actual2 = "<input id=\"idAnime2\" type=\"hidden\" name=\"id\" value=\"1\">";
            $id2 = "<input id=\"idAnime2\" type=\"hidden\" name=\"id\" value=\"3\">";
            $name_actual3 = "id=\"titleAnime3\">Jojo's Bizarre Adventures";
            $name3 = "id=\"titleAnime3\">Suzumiya Haruhi No Yuutsu";
            $url_actual3 = "https://lh3.googleusercontent.com/d/1D2_Mm_TRN5rlA5C_Mo1VKpCdZvzhXgcO";
            $url3 = "https://lh3.googleusercontent.com/d/1fqe3oF3q32oU9Sog0w3NCQPwfBg6p2e4";
            $id_actual3 = "<input id=\"idAnime3\" type=\"hidden\" name=\"id\" value=\"6\">";
            $id3 = "<input id=\"idAnime3\" type=\"hidden\" name=\"id\" value=\"4\">";
            $page_actual = "<input id=\"nextPageAnime\" type=\"hidden\" name=\"page\" value=\"2\">";
            $page = "<input id=\"nextPageAnime\" type=\"hidden\" name=\"page\" value=\"1\">";
        }
    } else {
        if ($page == 1){
            $url_actual1 = "https://lh3.googleusercontent.com/d/1DhrgILgsg91uVc8s4hWz2lLS_V7qlxwO";
            $url1 = "https://lh3.googleusercontent.com/d/1NgRPi6pZLG3q0cqFlchdzxeJwh062SCV";
            $name_actual1 = "id=\"titleManga1\">One Piece";
            $name1 = "id=\"titleManga1\">Attack On Titan";
            $id_actual1 = "<input id=\"idManga1\" type=\"hidden\" name=\"id\" value=\"1\">";
            $id1 = "<input id=\"idManga1\" type=\"hidden\" name=\"id\" value=\"4\">";
            $url_actual2 = "https://lh3.googleusercontent.com/d/1Y1klRwQLR9RKNmP-THsxagnmkarfAfzT";
            $url2 = "https://lh3.googleusercontent.com/d/1pHSH-1rEFPbY9QN2X1JlG-OJCQZBDq1P";
            $name_actual2 = "id=\"titleManga2\">One Punch Man";
            $name2 = "id=\"titleManga2\">Another";
            $id_actual2 = "<input id=\"idManga2\" type=\"hidden\" name=\"id\" value=\"2\">";
            $id2 = "<input id=\"idManga2\" type=\"hidden\" name=\"id\" value=\"5\">";
            $url_actual3 = "https://lh3.googleusercontent.com/d/1xLiRzFddo4GiGjMK6oUaiPn8vA_Qrwug";
            $url3 = "https://lh3.googleusercontent.com/d/1KhfvSYD_oXbWwxU4a_AmdeIFp3IbAKqt";
            $name_actual3 = "id=\"titleManga3\">Hunter X Hunter";
            $name3 = "id=\"titleManga3\">Tokyo Ghoul";
            $id_actual3 = "<input id=\"idManga3\" type=\"hidden\" name=\"id\" value=\"3\">";
            $id3 = "<input id=\"idManga3\" type=\"hidden\" name=\"id\" value=\"6\">";
            $page_actual = "<input id=\"nextPageManga\" type=\"hidden\" name=\"page\" value=\"1\">";
            $page = "<input id=\"nextPageManga\" type=\"hidden\" name=\"page\" value=\"2\">";
        } else {
            $url_actual1 = "https://lh3.googleusercontent.com/d/1NgRPi6pZLG3q0cqFlchdzxeJwh062SCV";
            $url1 = "https://lh3.googleusercontent.com/d/1DhrgILgsg91uVc8s4hWz2lLS_V7qlxwO";
            $name_actual1 = "id=\"titleManga1\">Attack On Titan";
            $name1 = "id=\"titleManga1\">One Piece";
            $url_actual2 = "https://lh3.googleusercontent.com/d/1pHSH-1rEFPbY9QN2X1JlG-OJCQZBDq1P";
            $url2 = "https://lh3.googleusercontent.com/d/1Y1klRwQLR9RKNmP-THsxagnmkarfAfzT";
            $name_actual2 = "id=\"titleManga2\">Another";
            $name2 = "id=\"titleManga2\">One Punch Man";
            $id_actual1 = "<input id=\"idManga1\" type=\"hidden\" name=\"id\" value=\"4\">";
            $id1 = "<input id=\"idManga1\" type=\"hidden\" name=\"id\" value=\"1\">";
            $id_actual2 = "<input id=\"idManga2\" type=\"hidden\" name=\"id\" value=\"5\">";
            $id2 = "<input id=\"idManga2\" type=\"hidden\" name=\"id\" value=\"2\">";
            $url_actual3 = "https://lh3.googleusercontent.com/d/1KhfvSYD_oXbWwxU4a_AmdeIFp3IbAKqt";
            $url3 = "https://lh3.googleusercontent.com/d/1xLiRzFddo4GiGjMK6oUaiPn8vA_Qrwug";
            $name_actual3 = "id=\"titleManga3\">Tokyo Ghoul";
            $name3 = "id=\"titleManga3\">Hunter X Hunter";
            $id_actual3 = "<input id=\"idManga3\" type=\"hidden\" name=\"id\" value=\"6\">";
            $id3 = "<input id=\"idManga3\" type=\"hidden\" name=\"id\" value=\"3\">";
            $page_actual = "<input id=\"nextPageManga\" type=\"hidden\" name=\"page\" value=\"2\">";
            $page = "<input id=\"nextPageManga\" type=\"hidden\" name=\"page\" value=\"1\">";
        }
    }
    
    $html = str_replace($url_actual1, $url1, $html);
    $html = str_replace($url_actual2, $url2, $html);
    $html = str_replace($url_actual3, $url3, $html);
    $html = str_replace($name_actual1, $name1, $html);
    $html = str_replace($name_actual2, $name2, $html);
    $html = str_replace($name_actual3, $name3, $html);
    $html = str_replace($id_actual1, $id1, $html);
    $html = str_replace($id_actual2, $id2, $html);
    $html = str_replace($id_actual3, $id3, $html);
    $html = str_replace($page_actual, $page, $html);
    file_put_contents("../home.html", $html);
    header("Location: ../home.html#$type");
    exit;
?>