<?php
function get_marks(){
if(!empty($_SESSION['login'])){
       $usid=$_SESSION['ID'];
}
$semammount=0;
$query = "SELECT * FROM marks WHERE ID = '$usid'";
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
if(!empty($_SESSION['login'])){
       $usid=$_SESSION['ID'];
}
$id="someID";
$query = "SELECT * FROM marks WHERE semester =$x AND ID = '$usid'";
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
}else{
    $result .='<h2 text-align="center" margin="0 auto">Оценки за данный семестр ещё не проставлены</h2>';
}   
foreach ($data as $elem) { 
    $result .= '<tr>'; 
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['ID'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['Subject'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['mark'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['date_p'] . '</td>';
    $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['teacher'] . '</td>'; 
    $result .= '<tr>'; 
} 
return $result;
}
?>