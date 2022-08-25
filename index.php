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
        require_once "create_db.php";
        if(create_db()) { 
            echo "<script>console.log('База создана и данные загружены')</script>";
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
            }
        })
    </script>
</body>
</html>