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

$str=$_SERVER['REQUEST_URI'];
$str1=explode("?",$str);
$link_id=explode("/",$str1[0])[1];
if ($link_id!="")
{
    $link=get_link($link_id);
    if ($link!='link Not found!')
    {
        header("Location: ".$link);
        echo $link;
    }
    else
    {
        echo $link;
    }
    
}
else
{
    echo 'link add failed!';
}

?>