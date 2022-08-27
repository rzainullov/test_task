const searchForm = document.getElementById("search__form");
        const tableBody = document.getElementById("result__table__body");
        const emptyResultsRow = "<tr><td style=\"color:red;color:red;text-align:center\"><i>Ничего не найдено</i></td></tr>";
        const searchInput = document.getElementById("search__form__input");
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

        