<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./styles/style.css">
    <title>Test task</title>
</head>

<body>
    <?php
    require_once "create_db_and_insert_data.php";
    require_once "get_data_count.php";
    if (create_db_and_insert_data()) {
        echo "<script>console.log(" . get_data_count() . ")</script>";
    }
    ?>
    <div id="search__app">
        <div id="search__wrapper">
            <header id="search__header">
                <div id="search__header__content">
                    
                </div>
            </header>
            <main id="search__main">
                <div id="search__main__content">
                    <h2 id="search__heading">Поиск комментария по фрагменту</h2>
                    <div id="search__form__container">
                        <form id="search__form">
                            <input type="text" id="search__form__input" name="searched" placeholder="Введите фрагмент комментария...">
                        </form>
                    </div>
                    <div id="result__table__container">
                        <table id="result__table">
                            <thead id="result__table__head">
                                <tr>
                                    <th>Заголовок записи</th>
                                    <th>Комментарий</th>
                                </tr>
                            </thead>
                            <tbody id="result__table__body">
                                <tr>
                                    <td style="color:red;text-align:center"><i>Ничего не найдено</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <footer id="search__footer">
                <div id="search__footer__content"></div>
            </footer>
        </div>
    </div>
    <script src="./js/script.js">

    </script>
</body>

</html>