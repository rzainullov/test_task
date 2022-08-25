<?php
    function transform_array_to_sql_query_insert($array,$table_name,...$columns) {
        $query = "INSERT INTO {$table_name} (" . implode(",",array_map(fn($column) => $column[1],$columns))  .") VALUES";
        $arr_length = count($array);
        for ($i=0; $i < $arr_length; $i++) { 
            $columns_data = array_map(fn($column) => $column[0] === "varchar" || $column[0] === "text" ? "'". $array[$i][$column[1]] ."'": $array[$i][replaceEndId($column[1])] ,$columns);
            $values = "(" . implode(",",$columns_data). ")";
            $values .= ($i !== $arr_length - 1 ) ?  "," :";";
            $query .= $values;
        }
        return $query;
    }
    function replaceEndId ($str) {
        return str_replace("_id","Id",$str);
    }
?>