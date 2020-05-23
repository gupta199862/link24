<?php
function get_all_links() {
    $myfile = fopen("links.txt", "r") or die("Unable to open file!");
    $file_data=fgets($myfile);
    fclose($myfile);
    $list_1=explode("##",$file_data);
    $a=array();
    for ($i=0;$i<sizeof($list_1)-1;$i++)
    {
        array_push($a,array(explode('**',$list_1[$i])[0],explode('**',$list_1[$i])[1]));
    }
    return $a;
}


function get_link($link_id) {
    $list=get_all_links();
    for($i=0;$i<sizeof($list);$i++)
    {
        if ($list[$i][0]==$link_id){
            return $list[$i][1];
        }
    }
    return 'link Not found!';
}

function add_link($link_id,$link) {
    if(get_link($link_id)=='link Not found!'){
        $myfile = fopen("links.txt", "a") or die("Unable to open file!");
        fwrite($myfile,$link_id.'**'.$link.'##');
        fclose($myfile);
        return "http://link24.life/".$link_id;
    }
    else
    {
        $myfile = fopen("links.txt", "r") or die("Unable to open file!");
        $file_data=fgets($myfile);
        fclose($myfile);
        $file_data=str_replace(get_link($link_id),$link,$file_data);
        $myfile = fopen("links.txt", "w") or die("Unable to open file!");
        fwrite($myfile,$file_data);
        fclose($myfile);
        return 'updated';
    }
    
}
$str=$_SERVER['REQUEST_URI'];
$str1=explode("?",$str);
$link_id=explode("/",$str1[0])[2];
$link=explode("=",$str1[1])[1];
if ($link_id!="")
{
    $mess=add_link($link_id,$link);
    echo $mess;
}
else
{
    echo 'link add failed!';
}

?>