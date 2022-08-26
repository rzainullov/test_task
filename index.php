<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test task</title>
</head>
<body>
    <?php
        require_once "create_db_and_insert_data.php";
        require_once "get_data_count.php";
        if(create_db_and_insert_data()) {
            echo "<script>console.log(". get_data_count() . ")</script>";
        } 
    ?>
    <form id="search_form">
       <label for="search">Поиск комментария по его фрагменту:<br>
            <input type="text" id="searched" name="searched" placeholder="Введите фрагмент комментария...">
       </label> 
    </form>
    <script>
        const searchForm = document.getElementById("search_form");
        const searchInput = document.getElementById("searched");
        const warning = document.createElement("p");
        warning.innerText = "Фрагмент комментария для поиска не должен быть менее 3-х символов";
        warning.setAttribute("id","warning");
        searchInput.addEventListener("keyup", (e) => {
            if(e.target.value.length < 3) {
                if(!document.getElementById("warning")){
                    searchForm.appendChild(warning);
                }
            } else {
                if(document.getElementById("warning")){
                    searchForm.removeChild(warning);
                }
                if(e.code.startsWith("Key")) {
                    fetch('./search_key.php',{method:"POST",body:e.target.value})
                    .then(responce => responce.json())
                    .then(data => console.log(data));
                }
            }
        })
    </script>
</body>
</html>