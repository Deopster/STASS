<?php
function get_marks(){
if(!empty($_SESSION['login'])){
       $usid=$_SESSION['ID'];
}
$semammount=0;
$query = "SELECT * FROM marks WHERE `Student` = '$usid'";
$result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
    $sem = $elem['grops_teachers_ID'];
    $quer = "SELECT `purpose` FROM `grops_teachers` WHERE `Teacher_groups ID` = '$sem'";
    $resul = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
        for ($dat = []; $ro = mysqli_fetch_assoc($resul); $dat[] = $ro); $resul = ''; foreach ($dat as $ele) { 
        $s = $ele['purpose'];
        $que = "SELECT `Subject` FROM `by_subjects` WHERE `link ID` = '$s'";
        $resu = mysqli_query($GLOBALS['link'], $que) or die(mysqli_error($link));
            for ($da = []; $r = mysqli_fetch_assoc($resu); $da[] = $r); $resu = ''; foreach ($da as $el) { 
            $n = $el['Subject'];
            $qu = "SELECT `semester` FROM `subject_list` WHERE `Subject ID` = '$n'";
            $res = mysqli_query($GLOBALS['link'], $qu) or die(mysqli_error($link));
                for ($d = []; $k = mysqli_fetch_assoc($res); $d[] = $k); $res = ''; foreach ($d as $e) { 
                $semester = $e['semester'];  
                if($semester>$semammount){
                $semammount=$semester;
                }

}
            }
        }
}
return  $semammount;
}

function get_table($x){
if(!empty($_SESSION['login'])){
       $usid=$_SESSION['ID'];
}
$id="someID";

$result='';
$query = "SELECT * FROM marks WHERE `Student` = '$usid'";
$results = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($results); $data[] = $row); $results = ''; foreach ($data as $elem) { 
    $sem = $elem['grops_teachers_ID'];
    $quer = "SELECT `purpose` FROM `grops_teachers` WHERE `Teacher_groups ID` = '$sem'";
    $resul = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
        for ($dat = []; $ro = mysqli_fetch_assoc($resul); $dat[] = $ro); $resul = ''; foreach ($dat as $ele) { 
        $s = $ele['purpose'];
        $que = "SELECT `Subject` FROM `by_subjects` WHERE `link ID` = '$s'";
        $resu = mysqli_query($GLOBALS['link'], $que) or die(mysqli_error($link));
            for ($da = []; $r = mysqli_fetch_assoc($resu); $da[] = $r); $resu = ''; foreach ($da as $el) { 
            $n = $el['Subject'];
            $qu = "SELECT `semester` , `subject` FROM `subject_list` WHERE `Subject ID` = '$n'";
            $res = mysqli_query($GLOBALS['link'], $qu) or die(mysqli_error($link));
                for ($d = []; $k = mysqli_fetch_assoc($res); $d[] = $k); $res = ''; foreach ($d as $e) { 
                $semester = $e['semester'];
                $sub = $e['subject'];
                if($semester == $x){
                    $query1 = "SELECT * FROM marks WHERE grops_teachers_ID ='$sem' AND `Student` = '$usid'";
                    $result1 = mysqli_query($GLOBALS['link'], $query1) or die(mysqli_error($link));
                    for ($data1 = []; $row1 = mysqli_fetch_assoc($result1); $data1[] = $row1); $result1 = ''; 
                    if(!empty($data1)){
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
                    foreach ($data1 as $elem1) { 
                        $result .= '<tr>'; 
                        $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem1['marks ID'] . '</td>';

                        $query2 = "SELECT `Subject` , `Teacher` FROM `by_subjects` WHERE `link ID` = '$s'";
                        $result2 = mysqli_query($GLOBALS['link'], $query2) or die(mysqli_error($link));
                        for ($data2 = []; $row2 = mysqli_fetch_assoc($result2); $data2[] = $row2); $result2 = ''; 
                        foreach ($data2 as $elem2) { 
                            $Teach=$elem2['Teacher'];
                            $query3 = "SELECT `Login` FROM `users` WHERE `User ID` = '$Teach'";
                            $result3 = mysqli_query($GLOBALS['link'], $query3) or die(mysqli_error($link));
                            for ($data3 = []; $row3 = mysqli_fetch_assoc($result3); $data3[] = $row3); $result3 = ''; 
                            foreach ($data3 as $elem3) { 
                                $T=$elem3['Login'];
                            } 
                        } 

                        $result .= '<td class="u-table-cell" id="'.$id.' "">' . $sub . '</td>';
                        $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['mark'] . '</td>';
                        $result .= '<td class="u-table-cell" id="'.$id.' "">' . $elem['date_p'] . '</td>';
                        $result .= '<td class="u-table-cell" id="'.$id.' "">' . $T . '</td>'; 
                        $result .= '<tr>'; 
                    } 
                    return $result;
                    }
                }

}
            }
        }
}





?>