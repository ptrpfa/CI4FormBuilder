<?php
// table_helper.php

if (!function_exists('generate_table')) {
    function generate_table($tableTitle, $columnTitles, $data, $type)
    {
        $table = '<div class="table-container" style="margin:3%;">';
        $table .= '<div class="d-flex justify-content-between align-items-center">';
        $table .= '<h3>' . $tableTitle . '</h3>';
        $table .= '<button class="btn btn-danger">New</button>';
        $table .= '</div>';
        $table .= '<div class="table-responsive">';
        $table .= '<table class="table table-hover">';
        $table .= '<thead><tr>';
        foreach ($columnTitles as $columnTitle) {
            $table .= '<th class="col-2 text-nowrap">' . $columnTitle . '</th>';
        }
        $table .= '<th class="col-2 text-nowrap">Action</th>';
        $table .= '</tr></thead>';
    
        $table .= '<tbody>';
        foreach ($data as $row) {
            $table .= '<tr>';
            $table .= '<td>';
            $table .= '<div class="' . $type . '">';
            $table .= '<span class="dropdown-toggle mr-2" id="dropdown_' . $row['id'] . '"></span>';
            $table .= $row['name'];
            $table .= '</div>';
            $table .= '</td>';
    
            $skipFirstColumn = true;
            foreach ($columnTitles as $columnTitle) {
                if ($skipFirstColumn) {
                    $skipFirstColumn = false;
                    continue;
                }
            
                $table .= '<td>' . ($row[$columnTitle] ?? '') . '</td>';
            }
    
            $table .= '<td>';
            $table .= '<div class="btn-group dropleft">';
            $table .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            $table .= 'Do What Nig';
            $table .= '</button>';
            $table .= '<div class="dropdown-menu">';
            $table .= '<button class="dropdown-item" type="button">New Form</button>';
            $table .= '<button class="dropdown-item" type="button" style="color:red;">Delete</button>';
            $table .= '</div>';
            $table .= '</div>';
            $table .= '</td>';       
    
            $table .= '</tr>';
    
            if (isset($row['Subrows']) && is_array($row['Subrows'])) {
                $table .= '<tbody class="subrows hide" id="subrows_' . $row['id'] . '" >';
                foreach ($row['Subrows'] as $subrow) {
                    $table .= '<tr style="background-color:#f0f0f0;" >';
                    $table .= '<td></td>';
                    foreach($subrow as $value){
                        $table .= '<td>' . $value . '</td>';
                    }
                    $table .= '<td>';
                    $table .= '<button class="btn btn-primary mr-2 edit-button">Edit</button>';
                    $table .= '<button class="btn btn-danger delete-button">Delete</button>';
                    $table .= '</td>';  
                    $table .= '</tr>';
                }
                $table .= '</tbody>';
            }
        }
        $table .= '</tbody>';
    
        $table .= '</table>';
        $table .= '</div>';
    
        $table .= '</div>';
    
        return $table;
    }
    
    
    
}