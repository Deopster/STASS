<?php
function get_marks(){
$semammount=0;
$query = "SELECT * FROM marks WHERE ID > 0";
$result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
    $sem = $elem['semester'];
    if($sem>$semammount){
        $semammount=$sem;
    }
}
return  $semammount;
}
function get_table($x){
$id="someID";
$query = "SELECT * FROM marks WHERE semester =$x";
$result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; 
if(!empty($data)){
    $result .='<tr style="height: 51px;">'; 
    $result .='<td class="u-table-cell">№ П/П</td>';
    $result .='<td class="u-table-cell">Наименование дисциплины</td>';
    $result .='<td class="u-table-cell">оценка</td>';
    $result .='<td class="u-table-cell">Дата сдачи</td>';
    $result .='<td class="u-table-cell">ФИО преподавателя</td>';
    $result .='</tr>';
}   
foreach ($data as $elem) { 
    $result .= '<tr>'; 
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['ID'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['Subject'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['mark'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['date'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['teacher'] . '</td>'; 
    $result .= '<tr>'; 
} 
return $result;
}
?>