<?php
    function transform_array_to_sql_query_insert($array,$table_name,...$columns) {
        $query = "INSERT INTO {$table_name} (" . implode(",",$columns). ") VALUES";
        $arr_length = count($array);
        for ($i=0; $i < $arr_length; $i++) { 
            $columns_data = array_map(fn($column) => $array[$i][$column],$columns);
            $values = "(" . implode(",",$columns_data). ")";
            $values .= ($i !== $arr_length - 1 ) ?  "," :";";
            $query .= $values;
        }
        return $query;
    }
?>