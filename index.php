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
    <table id="result_table">
        <thead id="result_table_head">
            <tr>
                <th>Заголовок записи</th>
                <th>Комментарий</th>
            </tr>
        </thead>
        <tbody id="result_table_body">
            <tr><td style="color:red"><i>Ничего не найдено</i></td></tr>
        </tbody>
    </table>
    <script>
        const searchForm = document.getElementById("search_form");
        const tableBody = document.getElementById("result_table_body");
        const emptyResultsRow = "<tr><td style=\"color:red\"><i>Ничего не найдено</i></td></tr>";
        const searchInput = document.getElementById("searched");
        const warning = document.createElement("p");
        warning.innerText = "Фрагмент комментария для поиска не должен быть менее 3-х символов";
        warning.setAttribute("id","warning");
        const getResultRow = (rowObject) => {
            const row = document.createElement("tr");
            const postTitleCell = document.createElement("td");
            const commentBodyCell = document.createElement("td");
            postTitleCell.innerText = rowObject.title;
            commentBodyCell.innerText = rowObject.body;
            row.append(postTitleCell,commentBodyCell);
            return row;
        }
        searchInput.addEventListener("keyup", (e) => {
            if(e.target.value.length < 3) {
                if(!document.getElementById("warning")){
                    searchForm.appendChild(warning);
                }
                tableBody.innerHTML = emptyResultsRow;
            } else {
                if(document.getElementById("warning")){
                    searchForm.removeChild(warning);
                }
                if(e.code.startsWith("Key") || e.code.startsWith("Digit") || e.code == "Backspace") {
                    fetch('./search_key.php',{method:"POST",body:e.target.value})
                    .then(responce => responce.json())
                    .then(data => {
                        tableBody.innerHTML = emptyResultsRow;
                        if(data.length !== 0) {
                            tableBody.innerHTML = "";
                            data.forEach((row,i) => tableBody.appendChild(getResultRow(row)));
                        }
                    });
                }
            }
        })
    </script>
</body>
</html>