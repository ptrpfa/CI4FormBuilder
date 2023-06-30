<?php

    /* Custom developer-specified helper functions */

    // Function to generate dashboard tables
    function create_dashboard_table($tableTitle, $columnTitles, $data, $type, $actions)
    {   

        /* 
            Arguments: 
            $tableTitle: Table's title
            $columnTitles: Array of column titles
            $data: Array of row data
            

        */

        var_dump($data);

        // Set table base 
        $table = '<div class="table-container" style="margin:3%;">';
        $table .= '<div class="d-flex justify-content-between align-items-center">';
        $table .= '<h3>' . $tableTitle . '</h3>';

        // New form template or response button
        $table .= '<button onclick="location.href=\''.site_url($actions['New']).'\'" class="btn btn-danger">New</button>';

        // Close table base tags
        $table .= '</div>';
        $table .= '<div class="table-responsive">';
        $table .= '<table class="table table-hover">';

        // Set column headers
        $table .= '<thead><tr>';
        foreach ($columnTitles as $columnTitle) {
            $table .= '<th class="col-2 text-nowrap">' . $columnTitle . '</th>';
        }
        $table .= '<th class="col-2 text-nowrap">Action</th>';
        $table .= '</tr></thead>';
        
        // Set table body
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
            
            if(array_key_exists('Create', $actions) || array_key_exists('DeleteAll', $actions)){
                $table .= '<td>';
                $table .= '<div class="btn-group dropleft">';
                $table .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $table .= 'Do What Nig';
                $table .= '</button>';
                $table .= '<div class="dropdown-menu">';
                if (array_key_exists('Create', $actions)) {
                    $table .= '<button onclick="location.href=\''.site_url($actions['Create']).'\'" class="dropdown-item" type="button">New Form</button>';
                }
                if (array_key_exists('DeleteAll', $actions)) {
                    $table .= '<button onclick="location.href=\''.site_url($actions['DeleteAll']).'\'"class="dropdown-item" type="button" style="color:red;">Delete</button>';
                }
                $table .= '</div>';
                $table .= '</div>';
                $table .= '</td>';       
            }else{
                $table .= '<td></td>';
            }

            $table .= '</tr>';
    
            if (isset($row['Subrows']) && is_array($row['Subrows'])) {
                $table .= '<tbody class="subrows hide" id="subrows_' . $row['id'] . '" >';
                foreach ($row['Subrows'] as $subrow) {
                    $table .= '<tr style="background-color:#f0f0f0;" >';
                    $table .= '<td></td>';
                    foreach($subrow as $key=>$value){
                        if($key != 'actions'){
                            $table .= '<td>' . $value . '</td>';
                        }
                    }
                    $rowAction = $subrow['actions'];

                    $table .= '<td>';
                    $table .= '<button onclick="location.href=\''.site_url($rowAction['Read']).'\'" class="btn btn-info mr-2 edit-button">View</button>';
                    $table .= '<button onclick="location.href=\''.site_url($rowAction['Update']).'\'" class="btn btn-primary mr-2 edit-button">Edit</button>';
                    $table .= '<button onclick="location.href=\''.site_url($rowAction['Delete']).'\'" class="btn btn-danger delete-button">Delete</button>';
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